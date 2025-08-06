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
        Schema::create('school_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_madrasah')->comment('Nama resmi madrasah');
            $table->string('npsn')->unique()->comment('Nomor Pokok Sekolah Nasional');
            $table->text('alamat')->comment('Alamat lengkap madrasah');
            $table->string('no_telepon')->nullable()->comment('Nomor telepon madrasah');
            $table->string('email')->nullable()->comment('Email madrasah');
            $table->string('website')->nullable()->comment('Website madrasah');
            $table->string('kepala_madrasah')->comment('Nama kepala madrasah');
            $table->string('logo_path')->nullable()->comment('Path logo madrasah');
            $table->text('visi')->nullable()->comment('Visi madrasah');
            $table->text('misi')->nullable()->comment('Misi madrasah');
            $table->text('sejarah')->nullable()->comment('Sejarah madrasah');
            $table->timestamps();

            // Index untuk performance
            $table->index('npsn');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('school_profiles');
    }
};