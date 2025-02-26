<?php

use Illuminate\Database\Migrations\Migration; // Mengimpor kelas Migration untuk membuat migrasi database
use Illuminate\Database\Schema\Blueprint; // Mengimpor kelas Blueprint untuk mendefinisikan struktur tabel
use Illuminate\Support\Facades\Schema; // Mengimpor kelas Schema untuk mengelola tabel database

// Mengembalikan instance dari kelas anonim yang mewarisi Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Membuat tabel 'items' dengan struktur yang didefinisikan di dalam function
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key dengan auto increment
            $table->string('name'); // Membuat kolom 'name' dengan tipe string (varchar)
            $table->string('description'); // Membuat kolom 'description' dengan tipe string (varchar)
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at' untuk menyimpan timestamp otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel 'items' jika rollback dijalankan
        Schema::dropIfExists('items');
    }
};

