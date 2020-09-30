<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chat_history', function(Blueprint $table)
		{
			$table->increments('history_id');
			$table->enum('message_type', array('file','message'));
			$table->text('message', 65535);
			$table->integer('channel_id')->unsigned()->index();
			$table->integer('sent_by')->unsigned()->index();
			$table->text('seen_by', 65535);
			$table->timestamp('sent_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chat_history');
	}

}
