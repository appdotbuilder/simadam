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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique()->comment('Nomor Induk Siswa');
            $table->string('nama')->comment('Nama lengkap siswa');
            $table->enum('jenis_kelamin', ['L', 'P'])->comment('L = Laki-laki, P = Perempuan');
            $table->date('tanggal_lahir')->comment('Tanggal lahir siswa');
            $table->string('tempat_lahir')->comment('Tempat lahir siswa');
            $table->text('alamat')->comment('Alamat lengkap siswa');
            $table->string('nama_orang_tua')->comment('Nama orang tua/wali');
            $table->string('no_telepon_orang_tua')->nullable()->comment('Nomor telepon orang tua/wali');
            $table->string('kelas')->comment('Kelas siswa saat ini');
            $table->enum('status', ['aktif', 'tidak_aktif', 'mutasi'])->default('aktif')->comment('Status siswa');
            $table->timestamps();

            // Indexes untuk performance
            $table->index('nis');
            $table->index('nama');
            $table->index('kelas');
            $table->index('status');
            $table->index(['status', 'kelas']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};