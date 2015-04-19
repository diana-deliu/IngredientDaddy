<?php namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class JsonController extends Controller {

    public function countries()
    {
        $countries = Country::all(['country_code', 'country_name']);

        return $countries;
    }

    public function cities($country_code)
    {
        $country = Country::whereCountryCode($country_code)->first();

        return array_pluck($country->cities()->get()->toArray(), 'city');
    }

}
