<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    /**
     * A city belongs to a timezone.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timezone() {
        return $this->belongsTo('App\Timezone');
    }

    /**
     * A city belongs to a country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country() {
        return $this->belongsTo('App\Country');
    }
}
