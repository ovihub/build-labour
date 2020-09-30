<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobDisputeHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_dispute_history', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dispute_id');
			$table->text('message', 65535);
			$table->integer('sent_by');
			$table->enum('message_type', array('message','file'));
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
		Schema::drop('job_dispute_history');
	}

}
