<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function index()
    {
        $tugas = Tugas::all();
        return view('dashboard.tugas.daftar-tugas', ['tugas' => $tugas]);
    }

    public function add()
    {
        return view('dashboard.tugas.tambah-tugas');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tugas' => 'required',
            'mapel' => 'required',
            'materi' => 'required',
            'deadline' => 'required',
            'level' => 'required',
        ]);

        $validatedData['status'] = 'Pending';
        
        Tugas::create($validatedData);
        return redirect('/tugas')->with('success-add', 'Tugas berhasil ditambahkan');
    }

    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        return view('dashboard.tugas.edit-tugas', ['tugas' => $tugas]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tugas' => 'required',
            'mapel' => 'required',
            'materi' => 'required',
            'deadline' => 'required',
            'level' => 'required',
        ]);
        
        Tugas::findOrFail($id)->update($validatedData);
        return redirect('/tugas')->with('success-update', 'Tugas berhasil diubah');
    }

    public function delete($id)
    {
        $tugas = Tugas::findOrFail($id);
        $tugas->delete();
        return redirect('/tugas')->with('success-delete', 'Tugas berhasil dihapus');
    }
}
