<?php

namespace App\Http\Controllers;

use App\Models\SupplierModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];
        $page = (object) [
            'title' => 'Daftar Supplier yang terdaftar dalam sistem',
        ];
        $activeMenu = 'supplier';

        return view('supplier.index', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function list()
    {
        $suppliers = SupplierModel::select('supplier_id', 'supplier_kode', 'supplier_nama');
        
        return DataTables::of($suppliers)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                $btn = '<a href="' . url('/supplier/' . $supplier->supplier_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/supplier/' . $supplier->supplier_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/supplier/' . $supplier->supplier_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah Supplier Baru',
        ];
        $activeMenu = 'supplier';
        
        return view('supplier.create', compact('breadcrumb', 'page', 'activeMenu'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:10|unique:m_supplier',
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_telepon' => 'required|string|max:15'
        ]);

        SupplierModel::create($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil ditambahkan');
    }

    public function show($id)
    {
        $supplier = SupplierModel::find($id);
        if (!$supplier) return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        
        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];
        $page = (object) [
            'title' => 'Detail Supplier',
        ];
        $activeMenu = 'supplier';
        
        return view('supplier.show', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function edit($id)
    {
        $supplier = SupplierModel::find($id);
        if (!$supplier) return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');

        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];
        $page = (object) [
            'title' => 'Edit Supplier',
        ];
        $activeMenu = 'supplier';

        return view('supplier.edit', compact('breadcrumb', 'page', 'activeMenu', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_kode' => 'required|string|max:10|unique:m_supplier,supplier_kode,' . $id . ',supplier_id',
            'supplier_nama' => 'required|string|max:100',
            'supplier_alamat' => 'required|string|max:255',
            'supplier_telepon' => 'required|string|max:15'
        ]);

        $supplier = SupplierModel::find($id);
        if (!$supplier) return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');

        $supplier->update($request->all());

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah');
    }

    public function destroy($id)
    {
        $supplier = SupplierModel::find($id);
        if (!$supplier) return redirect('/supplier')->with('error', 'Data supplier tidak ditemukan');
        
        try {
            $supplier->delete();
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena masih terkait dengan data lain');
        }
    }
}
