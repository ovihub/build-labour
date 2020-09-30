<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkExperiencePositionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('work_experience_positions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('position', 191);
			$table->date('duration');
			$table->text('responsibilities', 65535);
			$table->integer('work_exp_id')->unsigned();
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
		Schema::drop('work_experience_positions');
	}

}
