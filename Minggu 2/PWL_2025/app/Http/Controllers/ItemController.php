<?php

namespace App\Http\Controllers; // Menentukan namespace untuk controller

use App\Models\Item; // Mengimpor model Item untuk digunakan dalam controller
use Illuminate\Http\Request; // Mengimpor Request untuk menangani data dari form

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all(); // Mengambil semua data item dari database
        return view('items.index', compact('items')); // Mengembalikan view 'items.index' dengan data item
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create'); // Menampilkan form untuk membuat item baru
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', // Validasi agar name wajib diisi
            'description' => 'required', // Validasi agar description wajib diisi
        ]);
        //item::create($request->all());
        //return redirect()->route('items.index');

        //hanya masukkan atribut yang diizinkan
        Item::create($request->only('name', 'description')); // Menyimpan data baru ke database
        return redirect()->route('items.index')->with('success', 'Item created successfully.'); // Redirect ke halaman index dengan pesan sukses
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item')); // Menampilkan detail item berdasarkan ID
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item')); // Menampilkan form edit item
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required', // Validasi agar name wajib diisi
            'description' => 'required', // Validasi agar description wajib diisi
        ]);

        //$item = update(request->all());
        //return redirect()->route('items.index');
        //hanya masukkan atribut yang diizinkan
        $item->update($request->only(['name', 'description'])); // Mengupdate item dengan data yang diizinkan
        return redirect()->route('items.index')->with('success', 'Item updated successfully.'); // Redirect ke halaman index dengan pesan sukses
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //return redirect()->route('items.index');
        $item->delete(); // Menghapus item dari database
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.'); // Redirect ke halaman index dengan pesan sukses
    }
}
