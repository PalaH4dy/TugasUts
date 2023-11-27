<?php

namespace App\Http\Controllers;

use App\Models\PenanggungJawab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenanggungJawabController extends Controller
{
    public function index()
    {
        $pic = DB::table('penanggung_jawabs')->get();
        return view('pic.index', compact('pic'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_pic' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_wa' => 'required',
            'tanggal_lahir' => 'required',
        ]);
        $pic = new PenanggungJawab();
        $pic->nama_pic = $request->nama_pic;
        $pic->alamat = $request->alamat;
        $pic->jenis_kelamin = $request->jenis_kelamin;
        $pic->no_wa = $request->no_wa;
        $pic->tanggal_lahir = $request->tanggal_lahir;
        $pic->save();

        return redirect()->route('pic');
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_pic' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_wa' => 'required',
            'tanggal_lahir' => 'required',
        ]);
        $pic = PenanggungJawab::findOrFail($id);
        $pic->nama_pic = $request->nama_pic;
        $pic->alamat = $request->alamat;
        $pic->jenis_kelamin = $request->jenis_kelamin;
        $pic->no_wa = $request->no_wa;
        $pic->tanggal_lahir = $request->tanggal_lahir;
        $pic->save();

        return redirect()->route('pic');
    }
    public function delete($id)
    {
        $data = PenanggungJawab::findOrFail($id);
        $data->delete();
        return redirect()->route('pic')->with('success', 'Data Berhasi Di hapus !');
    }
}
