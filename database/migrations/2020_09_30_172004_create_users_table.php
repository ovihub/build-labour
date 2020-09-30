<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
			$table->string('first_name', 150)->nullable();
			$table->string('last_name', 150)->nullable();
			$table->string('email', 150)->unique();
			$table->string('password', 191);
			$table->date('date_of_birth')->nullable();
			$table->string('country', 150)->nullable();
			$table->string('mobile_number', 150)->nullable();
			$table->string('address', 150)->nullable();
			$table->string('profile_photo_url', 150)->nullable();
			$table->string('verification_code', 150)->nullable();
			$table->string('marital_status', 20)->nullable();
			$table->string('gender', 10)->nullable();
			$table->date('is_verified')->nullable();
			$table->smallInteger('role_id')->unsigned()->default(1);
			$table->string('remember_token', 100)->nullable();
			$table->timestamps();
			$table->string('country_birth', 191)->nullable();
			$table->softDeletes();
			$table->boolean('training_provider');
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
