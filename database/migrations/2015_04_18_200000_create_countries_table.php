<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('countries', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('country_code', 2)->index();
            $table->string('country_name');
            $table->string('continent_code', 2);
			$table->timestamps();
		});

        Schema::table('countries', function(Blueprint $table)
        {
            $table->foreign('continent_code')
                ->references('continent_code')
                ->on('continents');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('countries');
	}

}
