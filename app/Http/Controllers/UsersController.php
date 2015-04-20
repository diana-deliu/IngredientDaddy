<?php namespace App\Http\Controllers;

use Auth;

class UsersController extends Controller {

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
        $region = $user->region;

        return view('pages.profile', compact('user', 'region'));
    }

}
