<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkerTiersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worker_tiers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('tier_id');
			$table->integer('worker_id');
			$table->unique(['tier_id','worker_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worker_tiers');
	}

}
