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
        Schema::create('masyarakat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('nik')->unique();
            $table->string('nama', 35);
            $table->string('username', 200);
            $table->string('password', 200);
            $table->string('telp', 15);
            $table->timestamps();

            $table->softDeletes();
        });

        DB::table('masyarakat')->insert([
            'id' => Str::uuid(),
            'nik' => '2121212121',
            'nama' => 'masyarakat',
            'telp' => '6281',
            'username' => 'masyarakat',
            'password' => Hash::make('masyarakat')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masyarakats');
    }
};
