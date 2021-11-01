<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('person_id');
            $table->string('is_archiviato')->default(0);
            $table->string('contract_id');
            $table->string('house_type_id');
            $table->string('city');
            $table->string('address')->nullable();
            $table->string('vani')->nullable();
            $table->string('mq')->nullable();
            $table->string('piano')->nullable();
            $table->string('is_ascensore')->default(0);
            $table->string('link')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('img_path')->nullable();
            $table->string('note')->nullable();
            $table->string('prezzo');
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
        Schema::dropIfExists('houses');
    }
}
