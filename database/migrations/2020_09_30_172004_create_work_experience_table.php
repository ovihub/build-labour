<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkExperienceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_experience', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('job_role', 191)->nullable();
			$table->string('company_name', 191)->nullable();
			$table->integer('company_id')->unsigned()->nullable();
			$table->string('location', 191)->nullable();
			$table->string('project_size', 191)->nullable();
			$table->integer('start_month')->nullable();
			$table->integer('start_year')->nullable();
			$table->integer('end_month')->nullable();
			$table->integer('end_year')->nullable();
			$table->integer('duration_number');
			$table->string('duration_type', 191);
			$table->integer('user_id')->unsigned();
			$table->timestamps();
			$table->boolean('isCurrent')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('work_experience');
	}

}
