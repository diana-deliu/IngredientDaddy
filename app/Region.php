<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {

	protected $fillable = [
        'country_name',
        'country_code',
        'city'
    ];

    /**
     * A region has many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users() {
        return $this->hasMany('App\User');
    }

}
