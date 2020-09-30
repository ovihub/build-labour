<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnectionsMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('connections_map', function(Blueprint $table)
		{
			$table->increments('map_id');
			$table->integer('user_id')->unsigned()->index();
			$table->integer('connected_to')->unsigned();
			$table->integer('connection_id')->unsigned();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('connections_map');
	}

}
