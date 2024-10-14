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
        Schema::create('psy_datakelahiran', function (Blueprint $table) {
            $table->id();
            $table->string('ayah');
            $table->string('ibu');
            $table->string('bayi');
            $table->string('tgl_lahir');
            $table->string('tglmeninggal_bayi')->nullable();
            $table->string('tglmeninggal_ibu')->nullable();
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
        Schema::dropIfExists('psy_datakelahiran');
    }
};
