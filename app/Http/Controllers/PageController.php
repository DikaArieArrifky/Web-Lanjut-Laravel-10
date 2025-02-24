<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Method untuk menampilkan pesan selamat datang
    public function index()
    {
        return "Selamat Datang";
    }

    // Method untuk menampilkan Nama dan NIM
    public function about()
    {
        return "Nama: Dika <br> NIM: 12345678";
    }

    // Method untuk menampilkan halaman artikel dinamis berdasarkan ID
    public function articles($id)
    {
        return "Halaman Artikel dengan Id " . $id;
    }
}

