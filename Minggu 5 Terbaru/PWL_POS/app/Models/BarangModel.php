<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    public $timestamps = true;

    protected $fillable = [
        'kategori_id',    // ID dari tabel m_kategori (foreign key)
        'barang_kode',     // Kode unik barang
        'barang_nama',     // Nama barang
        'harga_beli',      // Harga beli barang
        'harga_jual'       // Harga jual barang

    ];
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}
