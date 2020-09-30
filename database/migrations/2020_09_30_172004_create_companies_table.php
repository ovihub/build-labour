<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 191)->nullable();
			$table->integer('business_type_id')->unsigned()->nullable();
			$table->integer('tier_id')->unsigned()->nullable();
			$table->integer('main_company_id')->unsigned()->nullable();
			$table->string('main_function_answer', 191)->nullable();
			$table->string('photo_url', 191)->nullable();
			$table->string('address', 191)->nullable();
			$table->string('phone', 191)->nullable();
			$table->text('introduction', 65535)->nullable();
			$table->string('website', 191)->nullable();
			$table->boolean('operate_outside_states')->default(0);
			$table->string('states', 191)->nullable();
			$table->integer('created_by')->unsigned()->nullable();
			$table->text('locations_json', 65535)->nullable();
			$table->timestamps();
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
		Schema::drop('companies');
	}

}
