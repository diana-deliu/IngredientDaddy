<?php namespace App\Http\Controllers;

use App\Ingredient;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

    /**
     * Accessible to guests.
     */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $ingredients = Ingredient::lists('name', 'name')->all();
        $warning = true;

        return view('pages.index', compact('ingredients', 'warning'));
	}

}
