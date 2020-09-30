<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJobPostStatsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('job_post_stats', function(Blueprint $table)
		{
			$table->foreign('performed_by')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('scored_to')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('job_post_stats', function(Blueprint $table)
		{
			$table->dropForeign('job_post_stats_performed_by_foreign');
			$table->dropForeign('job_post_stats_scored_to_foreign');
		});
	}

}
