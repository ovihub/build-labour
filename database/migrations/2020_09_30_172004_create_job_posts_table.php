<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobPostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title', 191)->nullable();
			$table->text('description', 65535)->nullable();
			$table->string('about', 191)->nullable();
			$table->string('exp_level', 191)->nullable();
			$table->string('contract_type', 191)->nullable();
			$table->string('salary', 191)->nullable();
			$table->string('salary_type', 191)->nullable();
			$table->string('project_size', 191)->nullable();
			$table->text('reports_to_json', 65535)->nullable();
			$table->string('location', 191)->nullable();
			$table->text('params', 65535)->nullable();
			$table->integer('company_id')->unsigned()->nullable();
			$table->integer('job_role_id')->unsigned()->nullable();
			$table->boolean('is_template')->nullable();
			$table->integer('created_by')->unsigned();
			$table->timestamps();
			$table->boolean('status')->default(1)->comment('1 - active , 0 - closed');
			$table->string('template_name', 191)->nullable()->comment('template name for a job');
			$table->integer('template_id')->unsigned()->nullable();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_posts');
	}

}
