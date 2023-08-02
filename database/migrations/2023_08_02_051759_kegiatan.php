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
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID field as primary key
            $table->string('judul');
            $table->string('kategori');
            $table->string('keterangan');
            $table->string('gambar');
            $table->string('keterangan_singkat');
            $table->string('tanggal_kegiatan');
            $table->string('lokasi');
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
        Schema::dropIfExists('kegiatan');
    }
};
