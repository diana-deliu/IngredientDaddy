<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model {

    /**
     * An ingredient belongs to many recipes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function ingredients()
    {
        return $this->belongsToMany('App\Ingredient')->withTimestamps();
    }

}
