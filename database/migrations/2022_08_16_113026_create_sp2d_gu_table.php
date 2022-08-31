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
        Schema::create('sp2d_gu', function (Blueprint $table) {
            $table->id();
            $table->date('tgl')->nullable();
            $table->string('no')->nullable();
            $table->string('no_cek')->nullable();
            $table->text('uraian')->nullable();
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
        Schema::dropIfExists('sp2d_gu');
    }
};
