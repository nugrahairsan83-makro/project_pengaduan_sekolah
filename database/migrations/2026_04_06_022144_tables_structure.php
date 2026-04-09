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
        // 1. Tabel Admin (Pengurus RT)
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // 2. Tabel Kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->integer('id_kategori')->autoIncrement();
            $table->string('ket_kategori', 50);
            $table->timestamps();
        });

        // 3. Tabel Input Aspirasi (Relasi ke tabel users)
        Schema::create('input_aspirasi', function (Blueprint $table) {
            $table->integer('id_pelaporan')->autoIncrement();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->integer('id_kategori');
            $table->string('lokasi', 100);
            $table->text('ket');
            $table->timestamps();

            // Foreign Key ke kategori
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });

        // 4. Tabel Aspirasi (Status & Feedback)
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->integer('id_aspirasi')->autoIncrement();
            $table->integer('id_pelaporan');
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu');
            $table->text('feedback')->nullable();
            $table->timestamps();

            $table->foreign('id_pelaporan')->references('id_pelaporan')->on('input_aspirasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
        Schema::dropIfExists('input_aspirasi');
        Schema::dropIfExists('kategori');
        Schema::dropIfExists('admin');
    }
};