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
        Schema::create('bukti_gu', function (Blueprint $table) {
            $table->id();
            $table->date('tgl')->nullable();
            $table->string('no')->nullable();
            $table->text('uraian')->nullable();
            $table->unsignedBigInteger('uraian_rekening_id')->nullable();
            $table->unsignedBigInteger('rekanan_id')->nullable();
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
        Schema::dropIfExists('bukti_gu');
    }
};
