<?php

namespace App\Http\Controllers;

use App\Models\Bagian;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $bagian = Bagian::with('pegawai')->get();
        $data = Pegawai::with('bagian')->get();
        $title = 'pegawai';
        return view('pegawai.index', compact('data', 'title', 'bagian'));
    }
    public function insertData(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'id_bagian' => 'required',
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_wa' => 'required',
            'tanggal_lahir' => 'required',
        ]);
        $data = new Pegawai();
        $data->id_bagian = $request->id_bagian;
        $data->nama_pegawai = $request->nama_pegawai;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_wa = $request->no_wa;
        $data->tanggal_lahir = $request->tanggal_lahir;

        $data->save();

        return redirect()->route('pegawai');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_bagian' => 'required',
            'nama_pegawai' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'no_wa' => 'required',
            'tanggal_lahir' => 'required',
        ]);
        $data = Pegawai::findOrFail($id);
        $data->id_bagian = $request->id_bagian;
        $data->nama_pegawai = $request->nama_pegawai;
        $data->alamat = $request->alamat;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->no_wa = $request->no_wa;
        $data->tanggal_lahir = $request->tanggal_lahir;

        $data->save();

        return redirect()->route('pegawai');
    }
    public function delete($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data Berhasi Di hapus !');
    }
}
