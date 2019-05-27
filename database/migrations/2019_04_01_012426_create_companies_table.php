<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('business_entity_type')->nullable();
            $table->string('entity_type_specialization')->nullable();
            $table->string('main_function')->nullable();
            $table->string('phone')->nullable();
            $table->text('locations_json')->nullable();
            $table->string('sector')->nullable();
            $table->string('tier')->nullable();
            $table->string('photo_url')->nullable();
            $table->text('introduction')->nullable();
            $table->string('website')->nullable();
            $table->boolean('operate_outside_states')->default(0);
            $table->string('states')->nullable();
            $table->integer('created_by')->unsigned()->nullable();
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
        Schema::dropIfExists('companies');
    }
}
