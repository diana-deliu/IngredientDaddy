<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password', 60);
            $table->boolean('confirmed')->default(0); // is the account confirmed via email?
            $table->string('confirmation_code')->nullable(); // the e-mail confirmation code
            $table->integer('region_id')->unsigned();
            $table->boolean('is_region_unreliable')->default(1); // is the region pulled just from the ip?
            $table->string('avatar_file_name')->nullable();
            $table->integer('avatar_file_size')->nullable();
            $table->string('avatar_content_type')->nullable();
            $table->timestamp('avatar_updated_at')->nullable();
            // allergies/restrictions?
            // user searches list
			$table->rememberToken();
			$table->timestamps();

            $table->foreign('region_id')
                ->references('id')
                ->on('regions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
