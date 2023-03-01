<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdmTanggapanController extends Controller
{
    public function butuhTanggapan()
    {
        $pengaduan = Pengaduan::join('masyarakats', 'pengaduans.nik', '=', 'masyarakats.nik')->select('pengaduans.*', 'masyarakats.nama', 'masyarakats.telp')->where('pengaduans.status', 'proses')->get();
        return view('admin.aduan.butuh_tanggapan')->with('data_pengaduan', $pengaduan);
    }

    public function tanggapanPage($id)
    {
        $aduan = Pengaduan::where('id_pengaduan', $id)->where('status', 'proses')->first();
        $pelapor = Masyarakat::where('nik', $aduan->nik)->first();
        return view('admin.aduan.beri_tanggapan')->with('dataPengaduan', $aduan)->with('pelapor', $pelapor);
    }

    public function beriTanggapan(Request $request)
    {
        $validated = $request->validate([
            'id_pengaduan' => 'required',
            'tanggapan' => 'required|min:5',
            'id_petugas' => 'required'
        ]);

        if ($validated) {
            Pengaduan::where('id_pengaduan', $request->id_pengaduan)->update([
                'status' => 'selesai'
            ]);

            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => Carbon::now(),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => $request->id_petugas,
            ]);

            return redirect('/admin/aduan/butuh_tanggapan')->with('alert', 'Selesai ditanggapi');
        }
    }
}
