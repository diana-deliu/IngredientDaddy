<?php namespace App\Services;

use App\Country;
use App\Region;
use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;
use stdClass;

class Registrar implements RegistrarContract
{

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
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
            'confirmation_code' => $data['confirmation_code']
        ]);
    }

    public function createRegion($data)
    {
        if(empty($data['country_code'])) {
            $result = $this->getRegionFromIp($_SERVER['REMOTE_ADDR']);
        } else {
            $result = $this->getRegionFromRequest($data);
        }

        return Region::firstOrCreate([
            'country_name' => $result->country_name,
            'country_code' => $result->country_code,
            'city' => (strpos($result->city, '(') !== false) ? null : $result->city
        ])->id;
    }

    private function getRegionFromRequest($data) {
        $result = new stdClass();
        $result->country_code = $data['country_code'];
        $result->city = $data['city'];
        $result->country_name = Country::whereCountryCode($data['country_code'])->first()->country_name;

        return $result;
    }

    private function getRegionFromIp($ip) {
        $url = 'http://api.hostip.info/get_json.php?ip=' . $ip;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result);
    }

}
