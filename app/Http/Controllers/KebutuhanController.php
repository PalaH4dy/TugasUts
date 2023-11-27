<?php

namespace App\Http\Controllers;

use App\Models\Kebutuhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KebutuhanController extends Controller
{
    public function index()
    {
        $kebutuhan = DB::table('kebutuhans')->get();
        return view('kebutuhan.index', compact('kebutuhan'));
    }
    public function store(Request $request)
    {

        $data = Kebutuhan::create($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('imageKebutuhan/', $request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('kebutuhan');
    }
    public function delete($id)

    {

        $data = Kebutuhan::findOrFail($id);
        $file = public_path('/imageKebutuhan/') . $data->image;
        if (file_exists($file)) {
            @unlink($file);
        }
        $data->delete();
        return redirect()->route('kebutuhan')->with('success', 'Data Berhasi Di hapus !');
    }
    public function update(Request $request, $id)
    {

        $data = Kebutuhan::updated($request->all());
        $data = Kebutuhan::find($id);
        $data->save();

        return redirect()->route('kebutuhan');
    }
}
