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
        Schema::create('transfer_letters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('nomor_surat')->unique()->comment('Nomor surat mutasi');
            $table->string('sekolah_tujuan')->comment('Nama sekolah tujuan');
            $table->text('alamat_sekolah_tujuan')->comment('Alamat sekolah tujuan');
            $table->date('tanggal_mutasi')->comment('Tanggal mutasi');
            $table->text('alasan_mutasi')->comment('Alasan mutasi siswa');
            $table->enum('status', ['diproses', 'selesai'])->default('diproses')->comment('Status surat mutasi');
            $table->timestamps();

            // Indexes untuk performance
            $table->index('nomor_surat');
            $table->index('student_id');
            $table->index('tanggal_mutasi');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transfer_letters');
    }
};