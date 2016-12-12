<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsPreselectedToAwardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('awards', function(Blueprint $table){
            $table->integer('isSelected')->default(0); //Seleccionado por un curador
            $table->integer('isPreselected')->default(1); // Seleccionado por un curador restringido
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
