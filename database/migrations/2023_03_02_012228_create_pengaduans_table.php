<?php

use Carbon\Carbon;
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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->uuid('id_pengaduan')->primary();
            $table->date('tgl_pengaduan');
            $table->bigInteger('nik');
            $table->string('judul');
            $table->text('isi_laporan');
            $table->string('foto')->nullable();
            $table->enum('status', ['dibatalkan', '0', 'proses', 'ditanggapi'])->default('0');
            $table->timestamps();

            $table->foreign('nik')->references('nik')->on('masyarakat');
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
