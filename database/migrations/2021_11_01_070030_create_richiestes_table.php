<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRichiestesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('richieste', function (Blueprint $table) {
            $table->id();
            $table->string('person_id')->nullable();
            $table->string('contract_id');
            $table->string('house_type_id');
            $table->string('vani');
            $table->string('max_price');
            $table->string('mutuo')->nullable();
            $table->longText('note')->nullable();
            $table->string('source_id')->nullable();
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
        Schema::dropIfExists('richieste');
    }
}
