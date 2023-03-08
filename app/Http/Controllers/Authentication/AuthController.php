<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::guard('petugas')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function createFormLogin()
    {
        if (Auth::check()) {
            return redirect('dashboard');
        }
        return response(view('petugas_login'));
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validated) {
            if (!Petugas::where('username', $request->username)->first()) {
                throw ValidationException::withMessages(['username' => 'Petugas ' . $request->username . ' tidak ditemukan.']);
            }
            if (Auth::guard('petugas')->attempt(['username' => $request->username, 'password' => $request->password])) {
                return redirect(route('dashboard'));
            } else {
                throw ValidationException::withMessages(['password', 'Password Salah']);
            }
            return redirect('login');
        }
    }
}
