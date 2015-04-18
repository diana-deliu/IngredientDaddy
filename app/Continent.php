<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model {

    /**
     * A continent has many countries.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function countries() {
        return $this->hasMany('App\Country', 'continent_code', 'continent_code');
    }

}
