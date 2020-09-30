<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatRequestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat_request', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('requesting_user')->unsigned();
			$table->integer('requested_user')->unsigned();
			$table->enum('status', array('Pending','Accepted','Rejected'));
			$table->timestamp('created')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chat_request');
	}

}
