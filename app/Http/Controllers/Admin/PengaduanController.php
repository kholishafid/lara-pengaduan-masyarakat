<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('status', '0')->get();
        return view('admin.verif.index')->with('aduan', $pengaduan);
    }
    public function show($id)
    {
        $pengaduan = Pengaduan::join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')->select('pengaduan.*', 'masyarakat.nama')->where('pengaduan.id_pengaduan', $id)->first();
        return view('admin.verif.show')->with('aduan', $pengaduan);
    }
    public function accept($id)
    {
        $verifikasi = Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'proses'
        ]);
        return redirect(route('verifikasi'));
    }
    public function reject($id)
    {
        $verifikasi = Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'ditolak'
        ]);
        return redirect(route('verifikasi'));
    }
}
