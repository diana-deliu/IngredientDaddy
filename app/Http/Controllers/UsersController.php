<?php namespace App\Http\Controllers;

use Auth;

class UsersController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();
        $region = $user->region;

        return view('pages.profile', compact('user', 'region'));
    }

}
