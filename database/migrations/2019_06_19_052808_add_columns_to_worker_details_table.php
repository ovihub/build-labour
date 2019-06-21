<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToWorkerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('worker_details', function (Blueprint $table) {

            $table->boolean('has_tfn')->unsigned()->default(false);
            $table->boolean('has_abn')->unsigned()->default(false);
            $table->boolean('has_whitecard')->unsigned()->default(false);
            $table->string('industry_area')->nullable();
            $table->integer('exp_year')->unsigned()->nullable();
            $table->integer('exp_month')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('worker_details', function (Blueprint $table) {
            //
        });
    }
}
