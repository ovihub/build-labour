<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkerDetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('worker_details', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('profile_description', 300)->nullable();
			$table->boolean('english_skill')->nullable()->default(0);
			$table->boolean('drivers_license')->nullable()->default(0);
			$table->boolean('can_drive_manual');
			$table->boolean('right_to_work')->nullable()->default(0);
			$table->string('main_skill', 191)->nullable();
			$table->string('introduction', 191)->nullable();
			$table->integer('when')->nullable();
			$table->integer('max_distance')->nullable();
			$table->string('address', 191)->nullable();
			$table->string('state', 191)->nullable();
			$table->boolean('nrole_right_to_work_au')->default(1);
			$table->integer('user_id')->unsigned()->unique();
			$table->boolean('day_labour_status');
			$table->boolean('has_registered_vehicle')->nullable();
			$table->boolean('education_id')->nullable();
			$table->boolean('has_tfn')->nullable();
			$table->boolean('has_abn')->nullable();
			$table->boolean('has_whitecard')->nullable();
			$table->boolean('willing_to_relocate')->nullable();
			$table->string('most_recent_role', 191)->nullable();
			$table->string('suburb', 191)->nullable();
			$table->integer('exp_year')->unsigned()->nullable();
			$table->integer('exp_month')->unsigned()->nullable();
			$table->text('params', 65535)->nullable();
			$table->softDeletes();
			$table->string('english_skill_competency', 191);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('worker_details');
	}

}
