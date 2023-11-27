<?php

namespace App\Http\Controllers;

use App\Models\Progres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProgresController extends Controller
{
    public function index()
    {
        $progres = DB::table('progres')->get();
        return view('progres.index', compact('progres'));
    }
    public function store(Request $request)
    {
        $validateprogres = $request->validate([
            'progres' => 'required'
        ]);
        $progres = new Progres();
        $progres->progres = $request->progres;
        $progres->save();

        return redirect()->route('progres')->with('success', 'progres berhasil di tambahkan !');
    }
    public function update(Request $request, $id)
    {

        $validateprogres = $request->validate([
            'progres' => 'required'
        ]);

        $progres = Progres::find($id);

        $progres->progres = $request->progres;
        $progres->save();

        return redirect()->route('progres')->with('success', 'progres berhasil di Edit !');
    }
    public function delete($id)
    {
        $progres = Progres::findOrFail($id);
        $progres->delete();
        return redirect()->route('progres')->with('success', 'progres Berhasi Di hapus !');
    }
}
