<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); 
            $table->string('nomborKadPengenalan')->unique();
            $table->string('nama');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nomborTelefonBimbit');
            $table->unsignedBigInteger('gred_id');
            $table->foreign('gred_id')->references('id')->on('gred');
            $table->unsignedBigInteger('pejabat_id');
            $table->foreign('pejabat_id')->references('id')->on('pejabat');
            $table->boolean('peranan')->nullable();
            $table->boolean('status')->default('0');
            $table->string('password');
            $table->string('noTelPej');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
