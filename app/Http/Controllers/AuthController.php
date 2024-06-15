<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed','min:8'],
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'instansi' => ['required', 'string']
        ]);

        DB::beginTransaction();

        try {
            $user = User::create($request->all());
            DB::commit();

            return redirect()->route('login');

        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function login(Request $request)
    {
        return view("auth.login");
    }

    public function loginStore(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required']
        ],[
            'email.exists'=>'Email belum terdaftar.'
        ]);

        // if (!User::where('email', $credentials['email'])->where('status', true)->first()) {
        //     return back()->withErrors([
        //     'email' => 'Akun Diblokir oleh Admin!',
        // ])->onlyInput('email');
        // }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == 'admin'){
                return redirect()->route('dashboard');
            }

            return redirect()->route('/');
        }

        return back()->withErrors([
            'password' => 'Password Salah!',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
