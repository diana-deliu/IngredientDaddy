<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateUserSearchesTable
 *
 * Keep track of all searches, be they logged in or not in order to give better results
 * according to location.
 */
class CreateUserSearchesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_searches', function(Blueprint $table)
		{
			$table->increments('id');
            // user (optional)
            // region (required)
            // ingredients list (required)
            // when?
            // recipe list (optional)
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
		Schema::drop('user_searches');
	}

}
