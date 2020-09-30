<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobDaylabourBookingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_daylabour_booking', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id');
			$table->integer('user_id');
			$table->enum('status', array('Open','Cancelled','Closed'));
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
		Schema::drop('job_daylabour_booking');
	}

}
