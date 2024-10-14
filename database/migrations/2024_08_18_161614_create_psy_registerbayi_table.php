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
        Schema::create('psy_registerbayi', function (Blueprint $table) {
            $table->id();
            $table->string('posyandu');
            $table->string('desa');
            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('bayi');
            $table->string('tgl_lahir');
            $table->string('bbl');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('dasawisma')->nullable();;
            $table->string('hasil_penimbangan')->nullable();
            $table->string('bulan')->nullable();
            $table->string('sirup_besi')->nullable();
            $table->string('bulan')->nullable();
            $table->string('vitami_A')->nullable();
            $table->string('bulan')->nullable();
            $table->string('oralit')->nullable();
            $table->string('bcg')->nullable();
            $table->string('dtp')->nullable();
            $table->string('polio')->nullable();
            $table->string('campak')->nullable();
            $table->string('hepatitis')->nullable();
            $table->string('tanggal_meninggal')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('psy_registerbayi');
    }
};
