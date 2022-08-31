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
        Schema::create('potongan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jenis_potongan_id');
            $table->string('nama')->nullable();
            $table->string('kode_map')->nullable();
            $table->decimal('tarif')->nullable();
            $table->string('perhitungan')->nullable();
            $table->boolean('is_dpp_harga_jual')->default(0);
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
        Schema::dropIfExists('potongan');
    }
};
