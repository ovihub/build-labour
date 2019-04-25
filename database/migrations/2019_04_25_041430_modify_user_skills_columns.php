<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUserSkillsColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_skills', function (Blueprint $table) {

            $table->dropColumn('skill');
            $table->dropColumn('description');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
            $table->integer('skill_id')->unsigned();
            $table->integer('skill_level_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
