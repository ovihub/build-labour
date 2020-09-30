<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobRequirementsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_requirements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191);
			$table->text('items_json', 65535)->nullable();
			$table->integer('job_id');
			$table->boolean('white_card');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_requirements');
	}

}
