<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkerAreasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worker_areas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('business_type_id');
			$table->integer('worker_id');
			$table->unique(['business_type_id','worker_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worker_areas');
	}

}
