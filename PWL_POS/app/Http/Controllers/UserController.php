<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index()
    {   
    //----------------------------JS 3 ------------------------------
    //     $data = [
    //         'username' => 'customer-1',
    //         'nama' => 'Pelanggan',
    //         'Password' => Hash::make('12345'),
    //         'level_id' => 4
    //     ];
    //    UserModel::insert($data);// tambahkan ke tabel m_user

    //     //mencoba akses model UserModel
    //     $users = UserModel::all(); // ambil semua data dari tabel m_user
    //     return view('user', ['data' => $users]);

        // $data = [
        //     'nama' => 'Pelanggan Pertama',
        // ];
        // UserModel::where('username', 'customer-1')->update($data); //update data user

        // //coba akses model UserModel
        // $users = UserModel::all(); //ambil semua data dari tabel m_user
        // return view('user', ['data' => $users]);

//----------------------------JS 4 ------------------------------
        $data = [
            'level_id' => 2,
            'username' => 'manager_tiga',
            'nama' => 'Manager 3',
            'password' => Hash::make('12345')
        ];
        UserModel::create($data);
        $user = UserModel::all();
        return view('user', ['data' => $user]);
    }
}
