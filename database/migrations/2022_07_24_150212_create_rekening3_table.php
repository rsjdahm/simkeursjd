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
        Schema::create('rekening3', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rekening2_id')->nullable();
            $table->unsignedBigInteger('kode1')->nullable();
            $table->unsignedBigInteger('kode2')->nullable();
            $table->unsignedBigInteger('kode3')->nullable();
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
        Schema::dropIfExists('rekening3');
    }
};
