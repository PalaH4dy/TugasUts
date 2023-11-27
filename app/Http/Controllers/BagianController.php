<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BagianController extends Controller
{
    // menampilkan data

    public function index()
    {
        $data = DB::table('bagians')->get();
        return view('bagian.index', compact('data'));
    }
    // menambah data
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_bagian' => 'required'
        ]);
        $data = new Bagian();
        $data->nama_bagian = $request->nama_bagian;
        $data->save();

        return redirect()->route('bagian')->with('success', 'data berhasil di tambahkan !');
    }
    //edit data
    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'nama_bagian' => 'required'
        ]);

        $data = Bagian::find($id);

        $data->nama_bagian = $request->nama_bagian;
        $data->save();

        return redirect()->route('bagian')->with('success', 'data berhasil di Edit !');
    }

    // delete data
    public function delete($id)
    {
        $data = Bagian::findOrFail($id);
        $data->delete();
        return redirect()->route('bagian')->with('success', 'Data Berhasi Di hapus !');
    }
}
