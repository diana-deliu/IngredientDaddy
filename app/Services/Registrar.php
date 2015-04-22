<?php namespace App\Services;

use App\City;
use App\Country;
use App\Region;
use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use stdClass;

class Registrar implements RegistrarContract
{

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

}
