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
        Schema::create('sibangenan', function (Blueprint $table) {
            $table->id();
            $table->string('namapemohon');
            $table->string('rw');
            $table->string('permasalahan');
            $table->string('urusan');
            $table->string('usulan');
            $table->string('tanggal_pengajuan');
            $table->string('lokasi');
            $table->string('dokumen_pendukung')->default('tidakadadokumen');;
            $table->string('status_pengajuan');
            $table->string('keterangan_penolakan');
            $table->string('catatan');
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
        Schema::dropIfExists('sibangenan');
    }
};
