<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->uuid('id_petugas')->primary();
            $table->string('nama_petugas', 35);
            $table->string('username', 25);
            $table->string('password');
            $table->string('telp', 13);
            $table->enum('level', ['admin', 'petugas'])->default('petugas');
            $table->timestamps();

            $table->softDeletes();
        });

        DB::table('petugas')->insert([
            'id_petugas' => Str::uuid(),
            'nama_petugas' => 'Admin_1',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'telp' => '1',
            'level' => 'admin',
        ]);

        DB::table('petugas')->insert([
            'id_petugas' => Str::uuid(),
            'nama_petugas' => 'Petugas_1',
            'username' => 'petugas',
            'password' => Hash::make('petugas'),
            'telp' => '011',
            'level' => 'petugas',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
