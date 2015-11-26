<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('regions', function(Blueprint $table)
		{
            $table->increments('id');
            $table->integer('country_id')->nullable()->unsigned();
            $table->integer('city_id')->nullable()->unsigned();
            // recipes list
            // ingredients list
            $table->timestamps();
		});

        Schema::table('regions', function(Blueprint $table)
        {
            $table->foreign('country_id')
                ->references('id')
                ->on('countries');

            $table->foreign('city_id')
                ->references('id')
                ->on('cities');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('regions');
	}

}
