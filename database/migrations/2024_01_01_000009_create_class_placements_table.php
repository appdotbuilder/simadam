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
        Schema::create('class_placements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('kelas_lama')->nullable()->comment('Kelas sebelumnya');
            $table->string('kelas_baru')->comment('Kelas yang baru');
            $table->string('tahun_ajaran')->comment('Tahun ajaran (contoh: 2023/2024)');
            $table->date('tanggal_penempatan')->comment('Tanggal penempatan');
            $table->text('alasan')->nullable()->comment('Alasan penempatan/perpindahan kelas');
            $table->timestamps();

            // Indexes untuk performance
            $table->index(['student_id', 'tahun_ajaran']);
            $table->index('kelas_baru');
            $table->index('tahun_ajaran');
            $table->index('tanggal_penempatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_placements');
    }
};