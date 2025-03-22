<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_kode' => 'SUP001',
                'supplier_nama' => 'PT. Sumber Jaya',
                'supplier_alamat' => 'Jl. Merdeka No. 1, Malang',
                'supplier_telepon' => '081234567890',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_kode' => 'SUP002',
                'supplier_nama' => 'CV. Anugerah Makmur',
                'supplier_alamat' => 'Jl. Bunga Raya No. 15, Surabaya',
                'supplier_telepon' => '081234567891',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supplier_kode' => 'SUP003',
                'supplier_nama' => 'UD. Sinar Terang',
                'supplier_alamat' => 'Jl. Melati No. 7, Jakarta',
                'supplier_telepon' => '081234567892',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];
        DB::table('m_supplier')->insert($data);
    }
}
