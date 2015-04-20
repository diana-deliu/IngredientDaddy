<?php namespace App\Http\Controllers;

use App\Country;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class JsonController extends Controller {

    /**
     * Get the cities for the country as json.
     *
     * @param $country_code
     * @return array
     */
    public function cities($country_code)
    {
        $country = Country::whereCountryCode($country_code)->first();

        return array_pluck($country->cities()->get()->toArray(), 'city');
    }

}
