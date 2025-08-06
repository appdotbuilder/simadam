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
        Schema::create('student_cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('nomor_kartu')->unique()->comment('Nomor kartu pelajar');
            $table->date('tanggal_cetak')->comment('Tanggal kartu dicetak');
            $table->date('berlaku_sampai')->comment('Tanggal berlaku kartu');
            $table->string('foto_path')->nullable()->comment('Path foto siswa untuk kartu');
            $table->enum('status', ['aktif', 'tidak_aktif', 'hilang'])->default('aktif')->comment('Status kartu');
            $table->timestamps();

            // Indexes untuk performance
            $table->index('nomor_kartu');
            $table->index('student_id');
            $table->index('tanggal_cetak');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_cards');
    }
};