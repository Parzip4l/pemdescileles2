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
        Schema::create('bumils', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->integer('nomorkk');
            $table->string('nama');
            $table->integer('usia');
            $table->integer('rt');
            $table->integer('rw');
            $table->string('tanggal_lahir');
            $table->string('nomor_telepon');
            $table->string('tanggal_perkiraan_lahir');
            $table->string('golongan_darah');
            $table->string('riwayat_kesehatan');
            $table->string('nama_suami');
            $table->string('nomor_telepon_suami');
            $table->string('tanggal_kunjungan_terakhir');
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
        Schema::dropIfExists('bumils');
    }
};
