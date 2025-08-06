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
        Schema::create('class_teachers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->string('kelas')->comment('Nama kelas yang diampu');
            $table->string('tahun_ajaran')->comment('Tahun ajaran (contoh: 2023/2024)');
            $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif')->comment('Status penugasan');
            $table->timestamps();

            // Indexes untuk performance
            $table->index(['teacher_id', 'tahun_ajaran']);
            $table->index('kelas');
            $table->index('tahun_ajaran');
            $table->unique(['kelas', 'tahun_ajaran']); // Satu kelas hanya boleh punya satu wali kelas per tahun ajaran
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_teachers');
    }
};