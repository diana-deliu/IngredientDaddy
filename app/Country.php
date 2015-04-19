<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {

    /**
     * A country has many cities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities() {
        return $this->hasMany('App\City', 'country_code', 'country_code');
    }

    /**
     * A country belongs to a continent.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function continent() {
        return $this->belongsTo('App\Continent');
    }

}
