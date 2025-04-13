<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    //
    public function index()
    {
        $breadcrumb = (object)[
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan']
        ];

        $page = (object)[
            'title' => 'Daftar Penjualan Barang',
        ];

        $activeMenu = 'penjualan';

        $penjualan = PenjualanModel::all();
        $user = UserModel::all();
        $barang = BarangModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'penjualan' => $penjualan, 'user' => $user, 'barang' => $barang]);
    }

    public function list(Request $request)
    {
        $penjualan = PenjualanModel::select('penjualan_id', 'user_id', 'pembeli', 'penjualan_kode', 'penjualan_tanggal');

        if ($request->penjualan_id) {
            $penjualan->where('penjualan_id', $request->penjualan_id);
        }

        return DataTables::of($penjualan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                // $btn = '<a href="' . url('/penjualan/' . $penjualan->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                // $btn .= '<a href="' . url('/penjualan/' . $penjualan->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                // $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $penjualan->penjualan_id) . '">'
                //     . csrf_field() . method_field('DELETE') .
                //     '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                $btn = '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/show_ajax') . '\')" class="btn btn-info btn-sm">Detail</button> ';
                
                $btn .= '<button onclick="modalAction(\'' . url('/penjualan/' . $penjualan->penjualan_id . '/delete_ajax') . '\')" class="btn btn-danger btn-sm">Hapus</button>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }


    public function create_ajax()
    {
        $penjualan = PenjualanModel::all();
        $user = UserModel::where('level_id', 4)->get();
        $barang = BarangModel::all();

        return view('penjualan.create_ajax', ['penjualan' => $penjualan, 'user' => $user, 'barang' => $barang]);
    }

    public function store_ajax(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'user_id' => 'required|exists:m_user,user_id',
                'pembeli' => 'required|string|max:50',
                'penjualan_kode' => 'required|string|max:20',
                'penjualan_tanggal' => 'required|date',
                'barang_id' => 'required|exists:m_barang,barang_id',
                // 'harga_satuan' => 'required|numeric|min:0',
                'jumlah_barang' => 'required|numeric|min:1'

            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validasi gagal',
                    'msgField' => $validator->errors()
                ]);
            }

            DB::beginTransaction();
            try {
                // Simpan data ke t_penjualan
                $penjualan = PenjualanModel::create([
                    'user_id' => $request->user_id,
                    'pembeli' => $request->pembeli,
                    'penjualan_kode' => $request->penjualan_kode,
                    'penjualan_tanggal' => $request->penjualan_tanggal,

                ]);

                // Ambil harga_jual dari t_barang
                $barang = BarangModel::where('barang_id', $request->barang_id)->first();
                if (!$barang) {
                    throw new \Exception("Barang tidak ditemukan");
                }

                // Hitung total dan kurangi stok
                $harga_jual = $barang->harga_jual;
                $jumlah_barang = $request->jumlah_barang;

                if ($barang->stok < $jumlah_barang) {
                    throw new \Exception("Stok barang tidak mencukupi");
                }

                // Simpan detail penjualan
                PenjualanDetailModel::create([
                    'penjualan_id' => $penjualan->penjualan_id,
                    'barang_id' => $request->barang_id,
                    'harga' => $harga_jual,
                    'jumlah' => $jumlah_barang,
                ]);

                // Kurangi stok barang
                //$barang->stok -= $jumlah_barang;
                $barang->save();

                DB::commit();

                return response()->json(['status' => true, 'message' => 'Penjualan berhasil disimpan']);
            } catch (\Exception $e) {
                DB::rollBack();
                return response()->json([
                    'status' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ]);
            }
        }

        return redirect('/');
    }

    public function show_ajax($id)
    {
        $penjualan = PenjualanModel::with([
            'user', // jika ingin tampilkan siapa yang input
            'penjualan_detail.barang' // relasi ke detail + barang
        ])->find($id);
        // $barang = BarangModel::all();
        // $user = UserModel::all();
        // $penjualanDetail = PenjualanDetailModel::all();
        if (!$penjualan) {
            return response()->json([
                'error' => 'Data tidak ditemukan',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return view('penjualan.show_ajax', compact('penjualan'));
    }

    public function edit_ajax($id)
    {
        $penjualan = PenjualanModel::find($id);
        $user = UserModel::all();
        return view('penjualan.edit_ajax', compact('penjualan', 'barang', 'user'));
    }

    public function update_ajax(Request $request, $id)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $rules = [
                'user_id' => 'required|exists:m_user,user_id',
                'pembeli' => 'required|string|max:50',
                'penjualan_kode' => 'required|string|max:20',
                'penjualan_tanggal' => 'required|date'
            ];
            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => 'Validasi gagal.', 'msgField' => $validator->errors()]);
            }

            $check = PenjualanModel::find($id);
            if ($check) {
                $check->update($request->all());
                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil diupdate'
                ]);
            } else {
                return response()->json(['status' => false, 'message' => 'Data tidak ditemukan']);
            }
        }

        return redirect('/');
    }
    public function confirm_ajax($id)
    {
        $penjualan = PenjualanModel::find($id);
        return view('penjualan.confirm_ajax', compact('penjualan'));
    }

    public function delete_ajax(Request $request, $id)
{
    if ($request->ajax() || $request->wantsJson()) {
        $penjualan = PenjualanModel::find($id);

        if ($penjualan) {
            try {
                $penjualan->penjualan_detail()->delete();

                $penjualan->delete();

                return response()->json([
                    'status' => true,
                    'message' => 'Data berhasil dihapus'
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'status' => false,
                    'message' => 'Data gagal dihapus. Mungkin masih memiliki relasi data lain.'
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    return redirect('/');
}

}
