<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobPostStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('job_post_stats', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('job_id')->unsigned();
			$table->integer('performed_by')->unsigned()->index('job_post_stats_performed_by_foreign');
			$table->integer('scored_to')->unsigned()->index('job_post_stats_scored_to_foreign');
			$table->string('category', 191)->comment('viewed, invited, favourite, not_suitable');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('job_post_stats');
	}

}
