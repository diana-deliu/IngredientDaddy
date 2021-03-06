<?php namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Requests\ProfileUpdateRequest;
use App\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    protected $redirectPath = '/profile#edit';

    /**
     * Only accessible to authenticated users.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Renders the user profile.
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $user = Auth::user();
        $country = $user->region->country;
        $city = $user->region->city;

        $countries = Country::lists('country_name', 'country_code')->all();
        $countries = ['' => 'Country'] + $countries;

        return view('pages.profile', compact('user', 'country', 'city', 'countries'));
    }

    /**
     * Update the user using the profile edit form.
     *
     * @param ProfileUpdateRequest|Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();
        $country_id = $this->getCountryId($request->country_code);
        $city_id = $this->getCityId($request->city);
        if (is_null($country_id) || is_null($city_id)) {
            return redirect($this->redirectPath())
                ->with([
                    'flash_message' => 'Invalid country or city!',
                    'flash_message_type' => 'alert-danger'
                ]);
        }

        $region_id = Region::firstOrCreate([
            'country_id' => $country_id,
            'city_id' => $city_id
        ])->id;

        $user->update([
            'name' => $request->name,
            'region_id' => $region_id,
            'is_region_unreliable' => 0
        ]);

        return redirect($this->redirectPath())
            ->with([
                'flash_message' => 'Profile successfully updated!',
                'flash_message_type' => 'alert-success'
            ]);
    }

    /**
     * @param $country_code
     * @return country_id
     */
    private function getCountryId($country_code)
    {
        $country = Country::whereCountryCode($country_code)->first();
        if (is_null($country)) {
            return null;
        }
        return $country->id;
    }

    /**
     * @param $city_name
     * @return city_id
     */
    private function getCityId($city_name)
    {
        $city = City::whereCity($city_name)->first();
        if (is_null($city)) {
            return null;
        }
        return $city->id;
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

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/profile#edit';
    }

    public function updateAvatar(Request $request) {

        $v = Validator::make($request->all(), [
            'avatar' => 'required|image',
        ]);

        if ($v->fails()) {
            return response()->json(['error' => 'No image received!']);
        }

        $user = Auth::user();
        $user->avatar = $request->file('avatar');
        $user->save();

        return response()->json(['avatar' => url($user->avatar->url('medium'))]);
    }


}
