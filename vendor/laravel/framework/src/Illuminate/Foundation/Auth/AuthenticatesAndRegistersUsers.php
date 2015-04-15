<?php namespace Illuminate\Foundation\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;

trait AuthenticatesAndRegistersUsers
{

    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * The registrar implementation.
     *
     * @var Registrar
     */
    protected $registrar;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->registrar->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }
        $confirmation_code = str_random(30);

        $data = $request->all();
        $data['confirmation_code'] = $confirmation_code;

//		$this->auth->login($this->registrar->create($request->all()));
        $this->registrar->create($data);

        $this->sendVerifyEmail($confirmation_code, Input::get('email'), Input::get('name'));

        return redirect($this->redirectPath())
            ->with([
                'flash_message' => 'Thank you for registering! Please check your e-mail.',
                'flash_message_type' => 'alert-success'
            ]);
    }

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

        if(!$this->auth->checkConfirmed($credentials)) {
            return redirect($this->loginPath())
                ->withInput($request->only('email', 'remember'))
                ->with([
                    'flash_message' => $this->getUnconfirmedAccountMessage(),
                    'flash_message_type' => 'alert-danger',
                    'resend' => $request->get('email')
                ]);
        }

        if ($this->auth->attempt($credentials, $request->has('remember'))) {
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
        $this->auth->logout();

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
