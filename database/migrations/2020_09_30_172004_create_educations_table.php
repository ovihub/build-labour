<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEducationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('educations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('course', 191)->nullable();
			$table->string('school', 191)->nullable();
			$table->integer('school_id')->unsigned()->nullable();
			$table->string('description', 191)->nullable();
			$table->integer('start_day')->unsigned()->nullable();
			$table->integer('start_month')->nullable();
			$table->integer('start_year')->nullable();
			$table->integer('end_day')->unsigned()->nullable();
			$table->integer('end_month')->nullable();
			$table->integer('end_year')->nullable();
			$table->integer('user_id')->unsigned();
			$table->integer('course_id')->unsigned()->nullable();
			$table->string('education_status', 191)->nullable();
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
		Schema::drop('educations');
	}

}
