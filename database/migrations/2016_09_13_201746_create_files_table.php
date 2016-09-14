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
            $table->integer('award_id')->unsigned();

            $table->foreign('file_type_id')->references('id')->on('file_types');
            $table->foreign('award_id')->references('id')->on('awards');

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
