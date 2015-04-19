<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timezone extends Model {

    /**
     * A city has many timezones.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities() {
        return $this->hasMany('App\City', 'timezone', 'timezone');
    }

}
