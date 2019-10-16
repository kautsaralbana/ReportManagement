<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_departements', function (Blueprint $table) {
            $table->bigIncrements('id_departement');
            $table->unsignedBigInteger('location_id');
            $table->foreign('location_id')
                ->references('id_location')->on('ms_locations')
                ->onDelete('cascade');

            $table->string('name');
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
        Schema::dropIfExists('tr_departements');
    }
}
