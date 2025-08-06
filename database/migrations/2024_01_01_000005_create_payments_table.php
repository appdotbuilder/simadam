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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained()->onDelete('cascade');
            $table->string('bulan')->comment('Bulan pembayaran (YYYY-MM)');
            $table->decimal('jumlah', 12, 2)->comment('Jumlah pembayaran SPP');
            $table->date('tanggal_bayar')->comment('Tanggal pembayaran');
            $table->enum('status', ['lunas', 'belum_lunas'])->default('belum_lunas')->comment('Status pembayaran');
            $table->text('keterangan')->nullable()->comment('Keterangan tambahan');
            $table->timestamps();

            // Indexes untuk performance
            $table->index(['student_id', 'bulan']);
            $table->index('tanggal_bayar');
            $table->index('status');
            $table->unique(['student_id', 'bulan']); // Satu siswa hanya boleh bayar sekali per bulan
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};