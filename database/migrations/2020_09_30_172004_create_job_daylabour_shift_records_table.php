<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobDaylabourShiftRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_daylabour_shift_records', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('job_id');
			$table->time('clock_in');
			$table->time('clock_out');
			$table->text('breaks');
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
		Schema::drop('job_daylabour_shift_records');
	}

}
