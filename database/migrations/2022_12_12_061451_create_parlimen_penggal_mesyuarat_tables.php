<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParlimenPenggalMesyuaratTables extends Migration
{
    /** 
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parlimen', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
  
        Schema::create('penggal', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
  
        Schema::create('mesyuarat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
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
        Schema::dropIfExists('parlimen');
        Schema::dropIfExists('penggal');
        Schema::dropIfExists('mesyuarat');
    }
}
