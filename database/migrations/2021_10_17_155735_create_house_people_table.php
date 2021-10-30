<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id');
            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreignId('person_id');
            $table->foreign('person_id')->references('id')->on('persons');
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
        Schema::dropIfExists('house_people');
    }
}
