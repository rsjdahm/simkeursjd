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
        Schema::create('pajak_gu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bukti_gu_id')->nullable();
            $table->unsignedBigInteger('potongan_id')->nullable();
            $table->decimal('dpp', 18)->default(0);
            $table->decimal('nilai', 18)->default(0);
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
        Schema::dropIfExists('pajak_gu');
    }
};
