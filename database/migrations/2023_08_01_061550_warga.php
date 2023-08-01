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
        Schema::create('warga', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID field as primary key
            $table->string('nik');
            $table->string('nokk');
            $table->string('hubungankk');
            $table->string('rt');
            $table->string('rw');
            $table->string('nama');
            $table->string('jk');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('statusperkawinan');
            $table->string('nomortelepon');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('penghasilan_perbulan');
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
        Schema::dropIfExists('warga');
    }
};
