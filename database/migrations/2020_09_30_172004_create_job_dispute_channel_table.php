<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobDisputeChannelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_dispute_channel', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id');
			$table->enum('status', array('Open','Closed'));
			$table->string('awarded_to', 50);
			$table->enum('creator', array('Company','Worker'));
			$table->string('subject', 200);
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
		Schema::drop('job_dispute_channel');
	}

}
