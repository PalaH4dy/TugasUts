<?php

namespace App\Http\Controllers;

use App\Models\Katagori;
use App\Models\Kebutuhan;
use App\Models\Pegawai;
use App\Models\PenanggungJawab;
use App\Models\PengajuanKebutuhan;
use App\Models\Progres;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        $kebutuhan = Kebutuhan::all();
        $katagori = Katagori::all();
        $progres = Progres::all();
        $pic = PenanggungJawab::all();
        $data = PengajuanKebutuhan::with('pegawai', 'kebutuhan', 'katagori', 'progres', 'pic')->get();
        $title = "pengajuan";
        return view('pengajuan.index', compact('data', 'title', 'pegawai', 'kebutuhan', 'katagori', 'progres', 'pic',));
    }
    public function cetak()
    {
        $pegawai = Pegawai::all();
        $kebutuhan = Kebutuhan::all();
        $katagori = Katagori::all();
        $progres = Progres::all();
        $pic = PenanggungJawab::all();
        $data = PengajuanKebutuhan::with('pegawai', 'kebutuhan', 'katagori', 'progres', 'pic')->get();
        $title = "pengajuan";
        return view('pengajuan.cetak', compact('data', 'title', 'pegawai', 'kebutuhan', 'katagori', 'progres', 'pic',));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'id_pegawai' => 'required',
            'id_kebutuhan' => 'required',
            'id_katagori' => 'required',
            'id_progres' => 'required',
            'id_pic' => 'required',
            'tanggal_pengajuan' => 'required',

        ]);

        $data = new PengajuanKebutuhan();
        $data->id_pegawai = $request->id_pegawai;
        $data->id_kebutuhan = $request->id_kebutuhan;
        $data->id_katagori = $request->id_katagori;
        $data->id_progres = $request->id_progres;
        $data->id_pic = $request->id_pic;
        $data->tanggal_pengajuan = $request->tanggal_pengajuan;

        $data->save();

        return redirect()->route('pengajuan');
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_pegawai' => 'required',
            'id_kebutuhan' => 'required',
            'id_katagori' => 'required',
            'id_progres' => 'required',
            'id_pic' => 'required',
            'tanggal_pengajuan' => 'required',

        ]);
        $data = PengajuanKebutuhan::findOrFail($id);
        $data->id_pegawai = $request->id_pegawai;
        $data->id_kebutuhan = $request->id_kebutuhan;
        $data->id_katagori = $request->id_katagori;
        $data->id_progres = $request->id_progres;
        $data->id_pic = $request->id_pic;
        $data->tanggal_pengajuan = $request->tanggal_pengajuan;
        $data->save();

        return redirect()->route('pengajuan');
    }
    public function delete($id)
    {
        $data = PengajuanKebutuhan::findOrFail($id);
        $data->delete();

        return redirect()->route('pengajuan')->with('success', 'Data Berhasi Di hapus !');
    }
}
