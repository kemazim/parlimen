<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->id(); 
            $table->string('rujukan')->nullable();
            $table->text('soalan');
            $table->string('tarikh');
            $table->unsignedBigInteger('parlimen_id');
            $table->foreign('parlimen_id')->references('id')->on('parlimen');
            $table->unsignedBigInteger('sidang_id');
            $table->foreign('sidang_id')->references('id')->on('sidang');
            $table->unsignedBigInteger('penggal_id');
            $table->foreign('penggal_id')->references('id')->on('penggal');
            $table->unsignedBigInteger('mesyuarat_id');
            $table->foreign('mesyuarat_id')->references('id')->on('mesyuarat');
            $table->unsignedBigInteger('yang_berhormat_id');
            $table->foreign('yang_berhormat_id')->references('id')->on('yang_berhormat');
            $table->unsignedBigInteger('jenis_dewan_id');
            $table->foreign('jenis_dewan_id')->references('id')->on('jenis_dewan');
            $table->unsignedBigInteger('jenis_pertanyaan_id');
            $table->foreign('jenis_pertanyaan_id')->references('id')->on('jenis_pertanyaan');
            $table->string('jawapan')->nullable();
            $table->text('jawapanTeks')->nullable();
            $table->text('jawapanTeksPDF')->nullable();
            $table->string('status');
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
        Schema::dropIfExists('question');
    }
}
