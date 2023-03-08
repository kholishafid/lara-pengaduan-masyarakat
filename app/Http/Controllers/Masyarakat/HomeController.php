<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $aduan_terbaru = Pengaduan::where('nik', Auth::user()->nik)->latest()->limit('5')->get();
        return view('masyarakat.home')->with('user', $user)->with('aduan_terbaru', $aduan_terbaru);
    }
}
