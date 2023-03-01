<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{

    public function MasyarakatLoginForm()
    {
        if (Auth::check()) {
            return redirect('home');
        }
        return view('login');
    }

    public function MasyarakatLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validated) {
            $masyarakat = Masyarakat::where('username', $request->username)->first();
            if (!$masyarakat) {
                throw ValidationException::withMessages(['username' => "User $request->username tidak ditemukan"]);
            }

            if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect('home');
            } else {
                throw ValidationException::withMessages(['password' => "Password Salah"]);
            }
        }
    }

    public function Register(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|integer|unique:masyarakats|digits_between: 1,16',
            'telp' => 'required|integer|digits_between: 1,15',
            'username' => 'required|string',
            'password' => 'required|min:8'
        ]);

        if ($validated) {
            $register = Masyarakat::create([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'telp' => '62' . $request->telp,
                'username' => $request->username,
                'password' =>  Hash::make($request->password)
            ]);

            if ($register) {
                if (Auth::guard('petugas')->check()) {
                    return redirect('/admin/masyarakat');
                }
                return redirect('login');
            }
        }
    }

    public function Logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function PetugasLoginForm()
    {
        if (Auth::guard('petugas')->check()) {
            return redirect('/admin/home');
        }
        return view('petugas.login');
    }

    public function PetugasLogin(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validated) {
            $petugas = Petugas::where('username', $request->username)->first();
            if (!$petugas) {
                throw ValidationException::withMessages(['username' => "Petugas $request->username tidak ada"]);
            }

            if (Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect('admin/home');
            } else {
                throw ValidationException::withMessages(['password' => "Password Salah"]);
            }
        }
    }
}
