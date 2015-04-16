<?php namespace App\Services;

use App\Region;
use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

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
            'region_id' => $this->createRegion(),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $data['confirmation_code']
        ]);
    }

    public function createRegion()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $url = 'http://api.hostip.info/get_json.php?ip=' . $ip;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        $result_array = json_decode($result);

        return Region::firstOrCreate([
            'country_name' => $result_array->country_name,
            'country_code' => $result_array->country_code,
            'city' => (strpos($result_array->city, '(') !== false) ? null : $result_array->city
        ])->id;

    }

}
