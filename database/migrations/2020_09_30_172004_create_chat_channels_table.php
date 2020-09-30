<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatChannelsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat_channels', function(Blueprint $table)
		{
			$table->increments('channel_id');
			$table->string('name', 50)->nullable();
			$table->string('type', 50)->default('one-on-one');
			$table->integer('connection_id')->nullable();
			$table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chat_channels');
	}

}
