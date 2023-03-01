<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class AdmPengaduanController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::join('masyarakats', 'pengaduans.nik', '=', 'masyarakats.nik')->select('pengaduans.*', 'masyarakats.nama', 'masyarakats.telp')->where('pengaduans.status', '0')->get();
        return view('admin.aduan.show')->with('data_pengaduan', $pengaduan);
    }

    public function approve($id)
    {
        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'proses'
        ]);

        return redirect('/admin/verif_aduan');
    }

    public function reject($id)
    {
        Pengaduan::where('id_pengaduan', $id)->update([
            'status' => 'dibatalkan'
        ]);

        return redirect('/admin/verif_aduan');
    }

    public function cekAduan($id)
    {
        $aduan = Pengaduan::where('id_pengaduan', $id)->first();
        $pelapor = Masyarakat::where('nik', $aduan->nik)->first();
        return view('admin.aduan.cek')->with('dataPengaduan', $aduan)->with('pelapor', $pelapor);
    }
}
