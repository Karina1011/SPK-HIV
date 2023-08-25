<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatDiagnosaTable extends Migration
{
    public function up()
    {
        Schema::create('riwayat_diagnosa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('penyakit_id');
            $table->text('gejala_terpilih');
            $table->timestamp('tanggal_diagnosa');
            $table->timestamps();

            // Definisi foreign key untuk pasien_id dan penyakit_id
            $table->foreign('pasien_id')->references('id')->on('pengguna')->onDelete('cascade');
            $table->foreign('penyakit_id')->references('id')->on('penyakit')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayat_diagnosa');
    }
}
