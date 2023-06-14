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
    // public function up()
    // {
    //     Schema::create('rules', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('id_penyakit');
    //         $table->string('daftar_gejala');
    //         $table->timestamps();
    //     });
    // }
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            // $table->string('kd_penyakit');
            // $table->string('kd_gejala');

            $table->foreignId('id_penyakit')->constrained('penyakits')->onDelete('cascade');
            $table->string('daftar_gejala');
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
        Schema::dropIfExists('rules');
    }
};
