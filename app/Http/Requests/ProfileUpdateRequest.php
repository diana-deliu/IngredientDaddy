<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileUpdateRequest extends Request {

    protected $redirect = '/profile#edit';

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        return [
            'name' => 'required|min:2',
            'country_code' => 'required|size:2',
            'city' => 'required|min:2'
        ];
	}

}
