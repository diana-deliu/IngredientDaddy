<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ingredient;
use Illuminate\Http\Request;

class SearchController extends Controller {

	public function search(Request $request)
    {
        if(!$request->has('q')) {
            return response()->json(['error' => 'No query received!']);
        }
        $recipes = [];
        foreach($request->q as $ingredient_id) {
            $ingredient = Ingredient::where(['id' => $ingredient_id])->first();
            $recipes = array_merge($recipes, $ingredient->recipes->toArray());
        }
        return $recipes;
    }

}
