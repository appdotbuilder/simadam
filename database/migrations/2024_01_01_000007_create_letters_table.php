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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique()->comment('Nomor surat resmi');
            $table->enum('jenis', ['masuk', 'keluar'])->comment('Jenis surat: masuk atau keluar');
            $table->string('perihal')->comment('Perihal/subjek surat');
            $table->string('pengirim')->nullable()->comment('Pengirim surat (untuk surat masuk)');
            $table->string('penerima')->nullable()->comment('Penerima surat (untuk surat keluar)');
            $table->date('tanggal_surat')->comment('Tanggal surat dibuat');
            $table->date('tanggal_diterima')->nullable()->comment('Tanggal surat diterima (untuk surat masuk)');
            $table->text('keterangan')->nullable()->comment('Keterangan tambahan');
            $table->string('file_path')->nullable()->comment('Path file surat yang diupload');
            $table->timestamps();

            // Indexes untuk performance
            $table->index('nomor_surat');
            $table->index('jenis');
            $table->index('tanggal_surat');
            $table->index('tanggal_diterima');
            $table->index('perihal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};