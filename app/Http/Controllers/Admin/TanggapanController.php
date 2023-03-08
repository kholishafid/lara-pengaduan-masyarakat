<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::where('status', 'proses')->get();
        return view('admin.tanggapan.index')->with('aduan', $pengaduan);
    }
    public function create($id)
    {
        $pengaduan = Pengaduan::join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')->select('pengaduan.*', 'masyarakat.nama')->where('pengaduan.status', 'proses')->first();
        return view('admin.tanggapan.add')->with('aduan', $pengaduan);
    }
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggapan' => 'required|min:6'
        ]);

        if ($validated) {
            Pengaduan::where('id_pengaduan', $id)->update([
                'status' => 4
            ]);
            Tanggapan::create([
                'id_pengaduan' => $id,
                'tgl_tanggapan' => Carbon::now(),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::user()->id_petugas,
            ]);
        }
        return redirect(route('butuh-tanggapan'));
    }
    public function finished()
    {
        $pengaduan = Pengaduan::where('status', 'ditanggapi')->get();
        return view('admin.tanggapan.finished')->with('aduan', $pengaduan);
    }
    public function show($id)
    {
        $pengaduan = Pengaduan::join('masyarakat', 'pengaduan.nik', '=', 'masyarakat.nik')->select('pengaduan.*', 'masyarakat.nama')->where('id_pengaduan', $id)->where('status', 'ditanggapi')->first();
        $tanggapan = Tanggapan::join('petugas', 'petugas.id_petugas', '=', 'tanggapan.id_petugas')->where('tanggapan.id_pengaduan', $id)->first();
        return view('admin.tanggapan.detail')->with('aduan', $pengaduan)->with('tanggapan', $tanggapan);
    }
}
