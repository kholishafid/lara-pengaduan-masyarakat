<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $user = Auth::user();
        $pengaduan = Pengaduan::where('nik', $user->nik)->get();
        return view('home')->with('dataUser', $user)->with('listAduan', $pengaduan);
    }
}
