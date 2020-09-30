<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobDaylabourDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_daylabour_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id');
			$table->integer('pay_rate');
			$table->date('job_date');
			$table->time('shift_start');
			$table->time('shift_end');
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
		Schema::drop('job_daylabour_details');
	}

}
