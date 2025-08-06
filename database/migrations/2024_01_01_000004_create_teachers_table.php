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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->comment('Nomor Induk Pegawai');
            $table->string('nama')->comment('Nama lengkap guru');
            $table->enum('jenis_kelamin', ['L', 'P'])->comment('L = Laki-laki, P = Perempuan');
            $table->date('tanggal_lahir')->comment('Tanggal lahir guru');
            $table->string('tempat_lahir')->comment('Tempat lahir guru');
            $table->text('alamat')->comment('Alamat lengkap guru');
            $table->string('no_telepon')->nullable()->comment('Nomor telepon guru');
            $table->string('bidang_studi')->comment('Mata pelajaran yang diampu');
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif')->comment('Status guru');
            $table->timestamps();

            // Indexes untuk performance
            $table->index('nip');
            $table->index('nama');
            $table->index('bidang_studi');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};