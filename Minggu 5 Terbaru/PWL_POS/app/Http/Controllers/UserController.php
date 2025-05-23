<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\userModel;
use App\Models\UserModel as ModelsUserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    //
    public function index()
    {

        $breadcrumb = (object) [
            'title' => 'Daftar User',
            'list' => ['Home', 'User']
        ];
        $page = (object) [
            'title' => 'Daftar User yang terdaftar dalam sistem',
        ];
        $activeMenu = 'user';

        $level = LevelModel::all();

        return view('user.index', ['breadcrumb' => $breadcrumb, 'page' => $page,'level' => $level,'activeMenu' => $activeMenu]);
    }

    // Ambil data user dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $users = UserModel::select('user_id', 'username', 'nama', 'level_id')
            ->with('level');
        //Filter data user berdasarkan level_id
        if ($request->level_id) {
            $users = $users->where('level_id', $request->level_id); 
        }
        return DataTables::of($users)
            // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addIndexColumn()
            ->addColumn('aksi', function ($user) { // menambahkan kolom aksi
                $btn = '<a href="' . url('/user/' . $user->user_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/user/' . $user->user_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' .
                    url('/user/' . $user->user_id) . '">'
                    . csrf_field() . method_field('DELETE') .
                    '<button type="submit" class="btn btn-danger btn-sm" onclick="return 
confirm(\'Apakah Anda yakit menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
            ->make(true);
    }
    
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah User',
            'list' => ['Home', 'User','Tambah']
        ];
        $page = (object) [
            'title' => 'Tambah User Baru',
        ];

        $level = LevelModel::All(); //mengambil data level untuk ditampilkan di form
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu,'level'=> $level]);
    }
    public function store(Request $request)
    {
       $request->validate([
        //username harus diisi, berupa string minimal 3 karakter, dan bernilai unik di tabel m_user kolom username
        'username' => 'required|string|min:3|unique:m_user',
        'nama'=> 'required|string|max:100',
        'password'=> 'required|min:5',
        'level_id'=> 'required|integer'
       ]);
       UserModel::create([
        'username'=> $request->username,
        'nama'=> $request->nama,
        'password'=> bcrypt($request->password), // password dienkripsi sebelum disimpan
        'level_id'=> $request->level_id
       ]);
       return redirect('/user')->with('success','Data user berhasil ditambahkan');
    }
    public function show($id)
    {
        $user = UserModel::with('level')->find($id);
        $breadcrumb = (object) [
            'title' => 'Detail User',
            'list' => ['Home', 'User','Detail']
        ];
        $page = (object) [
            'title' => 'Detail User',
        ];
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu,'user'=>$user]);
    }

    public function edit(string $id)
    {
        $user = UserModel::find($id);
        $level = LevelModel::all();

        $breadcrumb = (object) [
            'title' => 'Edit User',
            'list' => ['Home', 'User','Edit']
        ];
        $page = (object) [
            'title' => 'Edit User',
        ];
        $activeMenu = 'user'; // set menu yang sedang aktif
        return view('user.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu,'user'=>$user, 'level'=>$level]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            //username harus diisi, berupa string minimal 3 karakter
            //dan bernilai unik di tabel m_user kolom username kecuali untuk user dengan id yang sedang diedit
            'username' => 'required|string|min:3|unique:m_user,username,'.$id. ',user_id',
            'nama'=> 'required|string|max:100', //nama harus diisi, berupa string maksimal 100 karakter
            'password'=> 'nullable|min:5', // password bisa diisi (minimal 5 karakter) dan tidak bisa diisi
            'level_id'=> 'required|integer', // level_id harus diisi dan bertipe integer
        ]);

        UserModel::find($id)->update([
            'username'=> $request->username,
            'nama'=> $request->nama,
            'password'=> $request->password ? bcrypt($request->password) : UserModel::find( $id )->password,
            'level_id'=> $request->level_id            
        ]);
        return redirect('/user')->with('success','Data user berhasil diubah');
    }
    public function destroy(string $id)
    {
        $check = UserModel::find($id);
        if (!$check) { // untuk mengecek apakah data user dengan id yang dimaksud ada atau tidak 
            return redirect('/user')->with('success','Data user tidak ditemukan');
        }

        try {
            UserModel::destroy($id); // hapus data level

            return redirect('/user')->with('success','Data user berhasil dihapus');
        } catch (\Illuminate\Database\QueryException $e) {

            //jika terjadi error menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/user')->with('error','Data user gagal dihapus karena masih terdapat tabel lain yang terkait data ini');
        }
            
    }
}
