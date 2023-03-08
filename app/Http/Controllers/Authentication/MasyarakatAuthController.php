<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MasyarakatAuthController extends Controller
{
    function createFormLogin()
    {
        if (Auth::check()) {
            return redirect('home');
        }
        return view('login');
    }

    public function createFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'nik' => 'required|digits_between:1,15',
            'telp' => 'required|digits_between:1,15',
            'username' => 'required|min:5',
            'password' => 'required|min:5',
        ]);

        if ($validated) {
            Masyarakat::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telp' => $request->telp,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]);

            return redirect('login');
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validated) {
            if (!Masyarakat::where('username', $request->username)->first()) {
                throw ValidationException::withMessages(['username' => 'User ' . $request->username . ' tidak ditemukan.']);
            }

            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect(route('masyarakat_home'));
            } else {
                throw ValidationException::withMessages(['password' => 'Password Salah']);
            }
            return redirect('login');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
}
