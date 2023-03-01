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
        Schema::create('masyarakats', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->bigInteger('nik')->unique();
            $table->string('nama', 35);
            $table->string('username', 25);
            $table->string('password');
            $table->string('telp', 14);
            $table->timestamps();

            $table->softDeletes();
        });

        DB::table('masyarakats')->insert([
            'id' => Str::uuid(),
            'nik' => 123123,
            'nama' => 'masyarakat_1',
            'username' => 'masyarakat',
            'password' => Hash::make('masyarakat'),
            'telp' => '1',
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
