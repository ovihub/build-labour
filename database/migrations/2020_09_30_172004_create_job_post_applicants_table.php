<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobPostApplicantsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_post_applicants', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index('job_post_applicants_user_id_foreign');
			$table->integer('job_id')->unsigned();
			$table->enum('selected', array('Pending','Accepted','Awarded','Declined'));
			$table->dateTime('applied_at');
			$table->dateTime('selected_at')->nullable();
			$table->unique(['id','job_id','user_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_post_applicants');
	}

}
