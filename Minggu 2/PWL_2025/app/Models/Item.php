<?php

namespace App\Models; // Menentukan namespace model agar sesuai dengan struktur Laravel

use Illuminate\Database\Eloquent\Factories\HasFactory; // Menggunakan trait HasFactory untuk pembuatan data dummy (factory)
use Illuminate\Database\Eloquent\Model; // Menggunakan kelas Model sebagai dasar model Eloquent

class Item extends Model // Mendeklarasikan kelas Item yang merupakan model Eloquent
{
    use HasFactory; // Menggunakan trait HasFactory untuk mendukung pembuatan factory data dummy

    protected $fillable = [ // Menentukan atribut yang boleh diisi secara massal (mass assignment)
        'name', // Atribut name dapat diisi
        'description', // Atribut description dapat diisi
    ]; 
}
