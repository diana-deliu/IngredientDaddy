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
            // recipes list
            // region list
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
		Schema::drop('ingredients');
	}

}
