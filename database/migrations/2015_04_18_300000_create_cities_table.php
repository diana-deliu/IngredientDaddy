<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cities', function(Blueprint $table)
		{
            $table->engine='InnoDB';
            $table->increments('id');
            $table->string('city')->index();
            $table->string('country_code', 2);
            $table->string('timezone');
            $table->timestamps();
		});

        Schema::table('cities', function(Blueprint $table)
        {
            $table->foreign('country_code')
                ->references('country_code')
                ->on('countries');

            $table->foreign('timezone')
                ->references('timezone')
                ->on('timezones');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cities');
	}

}
