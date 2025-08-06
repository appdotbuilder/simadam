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
        Schema::create('diploma_pickups', function (Blueprint $table) {
            $table->id();
            $table->string('nama_siswa')->comment('Nama siswa yang mengambil ijazah');
            $table->string('nis')->comment('Nomor Induk Siswa');
            $table->string('tahun_lulus')->comment('Tahun kelulusan');
            $table->string('nama_pengambil')->comment('Nama orang yang mengambil ijazah');
            $table->enum('hubungan', ['siswa_sendiri', 'orang_tua', 'wali', 'lainnya'])->comment('Hubungan dengan siswa');
            $table->string('no_telepon_pengambil')->comment('Nomor telepon pengambil');
            $table->date('tanggal_pengambilan')->comment('Tanggal pengambilan ijazah');
            $table->text('keterangan')->nullable()->comment('Keterangan tambahan');
            $table->timestamps();

            // Indexes untuk performance
            $table->index('nama_siswa');
            $table->index('nis');
            $table->index('tahun_lulus');
            $table->index('tanggal_pengambilan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diploma_pickups');
    }
};