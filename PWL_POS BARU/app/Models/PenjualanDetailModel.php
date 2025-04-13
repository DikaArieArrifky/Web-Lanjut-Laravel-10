<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetailModel extends Model
{
    use HasFactory;

    protected $table = 't_penjualan_detail'; 
    protected $primaryKey = 'detail_id';     
    public $timestamps = true;               

    protected $fillable = [
        'penjualan_id',
        'barang_id',
        'harga',
        'jumlah',
    ];

    // Relasi ke Penjualan
    public function penjualan()
    {
        return $this->belongsTo(PenjualanModel::class, 'penjualan_id');
    }

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }
    
}