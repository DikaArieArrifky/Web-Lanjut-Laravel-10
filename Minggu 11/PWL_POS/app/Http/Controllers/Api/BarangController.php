<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function index()
    {
        //
        return BarangModel::all();
    }
    public function store(Request $request)
{
    // Validasi input
    $validator = Validator::make($request->all(), [
        'kategori_id' => 'required|integer|exists:m_kategori,kategori_id',
        'barang_kode' => 'required|string|max:10|unique:m_barang,barang_kode',
        'barang_nama' => 'required|string|max:100',
        'harga_beli' => 'required|integer',
        'harga_jual' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Jika validasi gagal
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

    // Upload gambar jika ada
    $imageName = null;
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->storeAs('public/gambar_barang', $imageName);
    }

    // Simpan data ke database
    $barang = BarangModel::create([
        'kategori_id' => $request->kategori_id,
        'barang_kode' => $request->barang_kode,
        'barang_nama' => $request->barang_nama,
        'harga_beli' => $request->harga_beli,
        'harga_jual' => $request->harga_jual,
        'image' => $imageName,
    ]);

    // Jika berhasil
    if ($barang) {
        return response()->json([
            'success' => true,
            'barang' => $barang,
        ], 201);
    }

    // Jika gagal
    return response()->json([
        'success' => false,
        'message' => 'Gagal menyimpan data barang.',
    ], 409);
}


    public function show(BarangModel $barang)
    {
        return BarangModel::find($barang);
    }

    public function update(Request $request, BarangModel $barang)
    {
        $barang->update($request->all());
        return response()->json($barang, 200);
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
