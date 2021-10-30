<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('house_id');
            $table->foreign('house_id')->references('id')->on('houses');
            $table->string('path_photo');
            $table->integer('is_planimetria')->default(0);
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
        Schema::dropIfExists('house_photos');
    }
}
