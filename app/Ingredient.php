<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model {

    /**
     * Get the recipes associated with the given ingredient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
	public function recipes()
    {
        return $this->belongsToMany('App\Recipe');
    }

}
