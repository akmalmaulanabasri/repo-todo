<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    //
    public function index(){
        $data = ToDo::all();
        return view('dashboard.to-do.index', compact('data'));
    }

    public function add(){
        return view('dashboard.to-do.add');
    }

    public function post(Request $request){
        $validate = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'deadline' => 'required'
        ]);

        $validate['status'] = 'Pending';

        ToDo::create($validate);
        return redirect()->route('to-do')->with('success-add', 'Tugas berhasil dibuat');
    }

    public function delete($id){
        ToDo::destroy($id);
        return redirect()->route('to-do')->with('success-delete', 'Data berhasil dihapus');
    }

    public function edit($id){
        $data = ToDo::find($id);
        return view('dashboard.to-do.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $validate = $request->validate([
            'nama' => 'required',
            'keterangan' => 'required',
            'deadline' => 'required'
        ]);
        $status = ToDo::find($id);
        $validate['status'] = $status->status;
        $todo = ToDo::find($id)->update($validate);
        return redirect()->route('to-do')->with('success-update', 'Data berhasil diubah');
    }
}
