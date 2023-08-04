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
        Schema::create('pengurus', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID field as primary key
            $table->string('nama');
            $table->string('jk');
            $table->string('jabatan');
            $table->string('nip');
            $table->string('foto');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('status_perkawinan');
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
        Schema::dropIfExists('pengurus');
    }
};
