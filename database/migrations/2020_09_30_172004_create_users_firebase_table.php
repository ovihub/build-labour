<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersFirebaseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users_firebase', function(Blueprint $table)
		{
			$table->increments('fid');
			$table->integer('user_id')->index();
			$table->string('device_token', 191)->index();
			$table->dateTime('added_at');
			$table->dateTime('expire_at');
			$table->boolean('push_notification_enabled')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users_firebase');
	}

}
