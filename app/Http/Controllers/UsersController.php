<?php namespace App\Http\Controllers;

use App\Country;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{

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

        $countries = Country::lists('country_name', 'country_code');
        $countries = ['' => 'Country'] + $countries;

        return view('pages.profile', compact('user', 'country', 'city', 'countries'));
    }

    /**
     * Update the user using the profile edit form.
     *
     * @param Request $request
     */
    public function update(Request $request)
    {
        $user = Auth::user();
    }


}
