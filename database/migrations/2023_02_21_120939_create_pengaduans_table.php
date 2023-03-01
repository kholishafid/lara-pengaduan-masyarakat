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
        Schema::create('pengaduans', function (Blueprint $table) {
            $table->uuid('id_pengaduan')->primary();
            $table->date('tgl_pengaduan');
            $table->bigInteger('nik');
            $table->text('isi_laporan');
            $table->string('foto')->nullable();
            $table->enum('status', ['dibatalkan', '0', 'proses', 'selesai'])->default('0');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakats');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduans');
    }
};
