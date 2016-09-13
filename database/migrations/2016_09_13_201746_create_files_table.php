<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');

            $table->integer('file_type_id')->unsigned();
            $table->integer('organization_id')->unsigned();
            $table->integer('production_id')->unsigned();
            $table->integer('propietor_id')->unsigned();

            $table->foreign('file_type_id')->references('id')->on('file_types');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('production_id')->references('id')->on('productions');
            $table->foreign('propietor_id')->references('id')->on('propietors');

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
        Schema::drop('files');
    }
}
