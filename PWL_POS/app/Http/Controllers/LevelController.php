<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\LevelDataTable;
use App\Models\LevelModel;

class LevelController extends Controller
{
    //
    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('level.index');
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(Request $request)
    {
        LevelModel::create([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
        ]);
        return redirect('/level');
    }

    public function edit($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('level.edit', compact('level'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kodeLevel' => 'required',
            'namaLevel' => 'required',
        ]);

        $level = LevelModel::findOrFail($id);

        $level->update([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
        ]);
        return redirect('/level');
    }

    public function destroy($id)
    {
        $level = LevelModel::findOrFail($id);
        $level->delete();

        return redirect()->route('level.index')->with('success', 'Level berhasil dihapus.');
    }
}