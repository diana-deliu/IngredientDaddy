<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateIngredientsTable
 *
 * Table containing all ingredients.
 */
class CreateIngredientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ingredients', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('name');
            $table->string('thumbnail_url')->nullable(); // do we need it?
            $table->integer('popularity')->default(0); // how many recipes reference this ingredient?
            // region list
			$table->timestamps();
		});

        Schema::create('ingredient_recipe', function(Blueprint $table)
        {
            $table->integer('ingredient_id')->unsigned()->index();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');

            $table->integer('recipe_id')->unsigned()->index();
            $table->foreign('recipe_id')->references('id')->on('recipes');

            $table->timestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('ingredient_recipe');
        Schema::drop('ingredients');
	}

}
