<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', ['title' => 'login', 'active' => 'login']);
    }
    // public function dash()
    // {
    //     return view('login.dash');
    // }
    public function register()
    {
        return view('login.register');
    }
    public function datapengguna()
    {
        $pengguna = DB::table('users')->get();
        return view('login.user', compact('pengguna'));
    }
    public function store(Request $request)

    {
        $this->validate($request, [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:4', 'confirmed']
        ]);

        // $cek = $request->validate([
        //     'email' => ['required','email', 'unique:users,email'],
        //     'password' => ['required', 'min:2', 'confirmed'],
        //     // 'password_confirmation' => ['required', 'min:2', 'confirmed']
        // ]);
        // dd($cek);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/user');
        }
    }



    public function deleteuser($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect()->route('pengguna')->with('success', 'Data Berhasi Di hapus !');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return view('dashbord.index');
        };


        return abort('404');
    }
}
