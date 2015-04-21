<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model {

	protected $fillable = [
        'country_id',
        'city_id',
    ];

    /**
     * A region has many users.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users() {
        return $this->hasMany('App\User');
    }

    /**
     * A region has one country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function country() {
        return $this->belongsTo('App\Country');
    }

    /**
     * A region has one city.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function city() {
        return $this->belongsTo('App\City');
    }

}
