<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori';
    protected $primaryKey = 'kategori_id';
    public $timestamps = true;

    protected $fillable = [
        'kategori_kode',  // Tambahkan ini untuk mass assignment
        'kategori_nama'
    ];
}
