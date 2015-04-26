<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateRecipesTable
 *
 * Table containing all recipes.
 */
class CreateRecipesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('recipes', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->string('image_url')->nullable(); // do we need it?
            $table->integer('difficulty')->nullable(); // easy, medium, hard
            $table->text('description')->nullable();
            $table->integer('time')->nullable(); // preparation time
            $table->integer('rating')->default(0); // 1-5 stars
            $table->integer('cost')->nullable(); // low, medium, high
            $table->integer('hits')->default(0); // number of url clicks
            // calories, energy, healthy etc? maybe calculate from ingredient quantities? or fetch from website?
            // region
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
		Schema::drop('recipes');
	}

}
