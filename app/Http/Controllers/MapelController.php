<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    public function index()
    {
        $mapel = User::find(Auth::user()->id)->mapel;
        return view('dashboard.pelajaran.jadwal-mapel' , ['mapel' => $mapel]);
    }

    public function add()
    {
        return view('dashboard.pelajaran.tambah-mapel');
    }

    public function edit($id)
    {
        $mapel = Mapel::find($id);
        return view('dashboard.pelajaran.edit-mapel', ['mapel' => $mapel]);
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::find($id);
        $validData = $request->validate([
            'mapel' => 'required',
            'guru' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'ruangan' => 'required',
        ]);
        $mapel->update($validData);
        return redirect('/pelajaran')->with('success-edit', 'Data berhasil diubah');
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'mapel' => 'required',
            'guru' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'ruangan' => 'required',
        ]);

        $validData['user_id'] = auth()->user()->id;

        Mapel::create($validData);
        return redirect()->route('jadwal-pelajaran')->with('success-add', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $mapel = Mapel::find($id);
        $mapel->delete();
        return redirect()->route('jadwal-pelajaran')->with('success-delete', 'Data berhasil diubah');
    }
}
