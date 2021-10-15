<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedInteger('age');
            $table->unsignedBigInteger('animal_type_id');
            $table->string('breed');
            $table->unsignedBigInteger('owner_id');
            $table->timestamps();
            $table->foreign('animal_type_id')->references('id')->on('animal_types');
            $table->foreign('owner_id')->references('id')->on('owners');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
