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
        Schema::create('remajas', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->integer('nomorkk');
            $table->string('nama');
            $table->integer('usia');
            $table->string('jenis_kelamin');
            $table->string('alamat');
            $table->string('rt', 5); // Ubah angka 5 sesuai panjang karakter RT di tingkat desa Anda
            $table->string('rw', 5);
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('nomor_telepon');
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
        Schema::dropIfExists('remajas');
    }
};
