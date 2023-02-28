<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYangBerhormat extends Migration
{ 
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('yang_berhormat', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('nama');
            $table->string('nama_parlimen')->unique();
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
        Schema::dropIfExists('yang_berhormat');
    }
}
