<?php namespace App\Http\Controllers\Auth;

use App\City;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

use App\User;
use App\Country;

use stdClass;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    //protected $auth;

    /**
     * The registrar implementation.
     *
     * @var Registrar
     */
    //protected $registrar;

    /**
     * Create a new authentication controller instance.
     *
     */
	public function __construct()
	{

		$this->middleware('guest', ['except' => 'getLogout']);
	}


	// the region is unreliable if it's not submitted by the user
	private $is_region_unreliable = true;

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
				'name' => 'required|min:2|max:225',
				'email' => 'required|email|max:255|unique:users',
				'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
				'region_id' => $this->createRegion($data),
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'confirmation_code' => $data['confirmation_code'],
				'is_region_unreliable' => $this->is_region_unreliable
		]);
	}

	/**
	 * Builds/gets the region for the new user.
	 *
	 * @param $data
	 * @return region_id
	 */
	public function createRegion($data)
	{
		if(empty($data['country_code'])) {
			$result = $this->getRegionFromIp($_SERVER['REMOTE_ADDR']);
		} else {
			$result = $this->getRegionFromRequest($data);
		}
		return Region::firstOrCreate([
				'country_id' => $result->country_id,
				'city_id' => $result->city_id
		])->id;
	}

	/**
	 * Gets the ids from the database according to the submitted form.
	 *
	 * @param $data
	 * @return country_id>, city_id>
	 */
	private function getRegionFromRequest($data) {
		$result = new stdClass();
		$result->country_id = $this->getCountryId($data['country_code']);
		$result->city_id = $this->getCityId($data['city']);

		if(!is_null($result->country_id) && !is_null($result->city_id)) {
			$this->is_region_unreliable = false;
		}

		return $result;
	}

	/**
	 * Queries hostip for location info and returns ids.
	 *
	 * @param $ip
	 * @return country_id>, city_id>
	 */
	private function getRegionFromIp($ip) {
		$url = 'http://api.hostip.info/get_json.php?ip=' . $ip;

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		$result_curl = json_decode(curl_exec($ch));
		curl_close($ch);

		$result = new stdClass();
		$result->country_id = $this->getCountryId($result_curl->country_code);
		if(strpos($result_curl->city, '(') !== false) {
			$result->city_id = null;
		} else {
			$result->city_id = $this->getCityId($result_curl->city);
		}

		return $result;
	}

	/**
	 * @param $country_code
	 * @return country_id
	 */
	private function getCountryId($country_code) {
		$country = Country::whereCountryCode($country_code)->first();
		if(is_null($country)) {
			return null;
		}
		return $country->id;
	}

	/**
	 * @param $city_name
	 * @return city_id
	 */
	private function getCityId($city_name) {
		$city = City::whereCity($city_name)->first();
		if(is_null($city)) {
			return null;
		}
		return $city->id;
	}

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        $countries = Country::lists('country_name', 'country_code')->all();
        $countries = ['' => 'Country'] + $countries;

        return view('auth.register', compact('countries'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $confirmation_code = str_random(30);

        $data = $request->all();
        $data['confirmation_code'] = $confirmation_code;

        $this->create($data);

        $this->sendVerifyEmail($confirmation_code, Input::get('email'), Input::get('name'));

        return redirect($this->redirectPath())
            ->with([
                'flash_message' => 'Thank you for registering! Please check your e-mail.',
                'flash_message_type' => 'alert-success'
            ]);
    }

    /**
     * Sends verification e-mail with confirmation code.
     *
     * @param $confirmation_code
     * @param $email
     * @param $name
     */
    private function sendVerifyEmail($confirmation_code, $email, $name)
    {
        $this->email = $email;
        $this->name = $name;
        Mail::send('emails.verify', ['confirmation_code' => $confirmation_code], function ($message) {
            $message->from('noreply@ingredientdaddy.com', 'IngredientDaddy');
            $message->to($this->email, $this->name);
            $message->subject('Verify your IngredientDaddy account');
        });
    }

    /**
     * Confirms the user account if the confirmation code is correct.
     *
     * @param $confirmation_code
     * @return \Illuminate\Http\RedirectResponse
     * @throws UsernameNotFoundException
     */
    public function getVerify($confirmation_code)
    {
        if(empty($confirmation_code)) {
            throw new UsernameNotFoundException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if(is_null($user)) {
            throw new UsernameNotFoundException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        return redirect($this->redirectPath())
            ->with([
                'flash_message' => 'Your account has been activated! You can now log in.',
                'flash_message_type' => 'alert-success'
            ]);
    }

    /**
     * Resends the verification e-mail.
     *
     * @param $email
     * @return \Illuminate\Http\RedirectResponse
     * @throws UsernameNotFoundException
     */
    public function getResend($email)
    {
        $user = User::whereEmail($email)->first();
        if (is_null($user)) {
            throw new UsernameNotFoundException;
        }
        if ($user->confirmed) {
            return redirect($this->loginPath())
                ->with([
                    'flash_message' => 'Your account has already been confirmed! You can log in now.',
                    'flash_message_type' => 'alert-info'
                ]);
        }
        $this->sendVerifyEmail($user->confirmation_code, $user->email, $user->name);
        return redirect($this->redirectPath())
            ->with([
                'flash_message' => 'Confirmation code has been resent! Please check your e-mail.',
                'flash_message_type' => 'alert-success'
            ]);
    }

    /**
     * Show the application login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(!Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password'], 'confirmed' => 1])) {
            return redirect($this->loginPath())
                ->withInput($request->only('email', 'remember'))
                ->with([
                    'flash_message' => $this->getUnconfirmedAccountMessage(),
                    'flash_message_type' => 'alert-danger',
                    'resend' => $request->get('email')
                ]);
        }

        if (Auth::attempt($credentials, $request->has('remember'))) {
            return redirect()->intended('/home')
                ->with([
                    'flash_message' => 'You have been logged in!',
                    'flash_message_type' => 'alert-info'
                ]);
        }

        return redirect($this->loginPath())
            ->withInput($request->only('email', 'remember'))
            ->with([
                'flash_message' => $this->getFailedLoginMessage(),
                'flash_message_type' => 'alert-danger'
            ]);
    }

    /**
     * Get the failed login message.
     *
     * @return string
     */
    protected function getFailedLoginMessage()
    {
        return 'These credentials do not match our records.';
    }

    /**
     * The unconfirmed account message.
     *
     * @return string
     */
    protected function getUnconfirmedAccountMessage()
    {
        return 'Your account has not been confirmed yet. Please check your email.';
    }

    /**
     * Log the user out of the application.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect(property_exists($this, 'redirectAfterLogout') ? $this->redirectAfterLogout : '/')
            ->with([
                'flash_message' => 'You have been logged out!',
                'flash_message_type' => 'alert-info'
            ]);
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (property_exists($this, 'redirectPath')) {
            return $this->redirectPath;
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Get the path to the login route.
     *
     * @return string
     */
    public function loginPath()
    {
        return property_exists($this, 'loginPath') ? $this->loginPath : '/auth/login';
    }

}
