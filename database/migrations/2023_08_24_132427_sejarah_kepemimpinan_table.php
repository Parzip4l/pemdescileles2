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
        Schema::create('sejarah_kepemimpinan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('dari_tahun');
            $table->string('sampai_tahun');
            $table->string('pemimpin_sekarang');
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
        Schema::dropIfExists('sejarah_kepemimpinan');
    }
};
