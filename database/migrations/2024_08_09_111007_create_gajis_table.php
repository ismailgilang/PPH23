<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id(); // id kolom sebagai primary key dengan auto-increment
            $table->string('nama'); // kolom untuk nama
            $table->string('thp'); // kolom untuk total gaji setelah pajak, dengan presisi 15 dan skala 2
            $table->string('mutu_gaji'); // kolom untuk mutu gaji
            $table->string('pph23'); // kolom untuk PPh23
            $table->string('jabatan'); // kolom untuk jabatan
            $table->timestamps(); // kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
