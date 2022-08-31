<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekening6', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekening5_id')->nullable();
            $table->unsignedBigInteger('kode1')->nullable();
            $table->unsignedBigInteger('kode2')->nullable();
            $table->unsignedBigInteger('kode3')->nullable();
            $table->unsignedBigInteger('kode4')->nullable();
            $table->unsignedBigInteger('kode5')->nullable();
            $table->unsignedBigInteger('kode6')->nullable();
            $table->string('nama')->nullable();
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
        Schema::dropIfExists('rekening6');
    }
};
