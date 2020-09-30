<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToUserSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_skills', function(Blueprint $table)
		{
			$table->foreign('level_id')->references('id')->on('levels')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('skill_id')->references('id')->on('skills')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('user_id')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_skills', function(Blueprint $table)
		{
			$table->dropForeign('user_skills_level_id_foreign');
			$table->dropForeign('user_skills_skill_id_foreign');
			$table->dropForeign('user_skills_user_id_foreign');
		});
	}

}
