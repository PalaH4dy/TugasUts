<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KatagoriController extends Controller
{
    public function index()
    {
        $katagori = DB::table('katagoris')->get();
        return view('katagori.index', compact('katagori'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_katagori' => 'required'
        ]);
        $katagori = new Katagori();
        $katagori->nama_katagori = $request->nama_katagori;
        $katagori->save();

        return redirect()->route('katagori');
    }
    public function update(Request $request, $id)
    {

        $validateData = $request->validate([
            'nama_katagori' => 'required'
        ]);

        $data = Katagori::find($id);

        $data->nama_katagori = $request->nama_katagori;
        $data->save();

        return redirect()->route('katagori')->with('success', 'data berhasil di Edit !');
    }
    public function delete($id)
    {
        $data = Katagori::findOrFail($id);
        $data->delete();
        return redirect()->route('katagori')->with('success', 'Data Berhasi Di hapus !');
    }
}
