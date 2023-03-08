<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengaduan = Pengaduan::where('nik', Auth::user()->nik)->get();
        return view('masyarakat.aduan.show')->with('aduan', $pengaduan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('masyarakat.aduan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|min:5',
            'isi_laporan' => 'required|min:5'
        ]);

        if ($validated) {
            if ($request->file('foto')) {
                $path = $request->file('foto')->store('foto_aduan');

                Pengaduan::create([
                    'judul' => $request->judul,
                    'tgl_pengaduan' => Carbon::now(),
                    'nik' => Auth::user()->nik,
                    'isi_laporan' => $request->isi_laporan,
                    'foto' => $path
                ]);

                return redirect(route('masyarakat_home'));
            }
            Pengaduan::create([
                'judul' => $request->judul,
                'tgl_pengaduan' => Carbon::now(),
                'nik' => Auth::user()->nik,
                'isi_laporan' => $request->isi_laporan,
            ]);

            return redirect(route('masyarakat_home'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $aduan_detail = Pengaduan::where('id_pengaduan', $id)->first();
        $tanggapan = Tanggapan::join('petugas', 'tanggapan.id_petugas', '=', 'petugas.id_petugas')->where('tanggapan.id_pengaduan', $id)->select('tanggapan.*', 'petugas.username')->first();
        return view('masyarakat.aduan.detail')->with('aduan', $aduan_detail)->with('tanggapan', $tanggapan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
