<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return response(view('new_pengaduan'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'isi_laporan' => 'required|string',
        ]);

        if ($validated) {
            $now = Carbon::now();
            $nik = Auth::user()->nik;

            if ($request->file('foto')) {
                $path = $request->file('foto')->store('foto-aduan');

                $pengaduan = Pengaduan::create([
                    'tgl_pengaduan' => $now,
                    'nik' => $nik,
                    'isi_laporan' => $request->isi_laporan,
                    'foto' => $path,
                ]);

                return redirect('/home');
            }
            $pengaduan = Pengaduan::create([
                'tgl_pengaduan' => $now,
                'nik' => $nik,
                'isi_laporan' => $request->isi_laporan,
            ]);
            return redirect('/home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        $pelapor = Auth::user();
        $pengaduan_detail = Pengaduan::where('nik', $pelapor->nik)->where('id_pengaduan', $id)->first();
        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();
        return response(view('detail_aduan')->with('dataPengaduan', $pengaduan_detail)->with('pelapor', $pelapor)->with('tanggapan', $tanggapan));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $validated = $request->validate([
            'isi_laporan' => 'required|string',
        ]);

        $aduan = Pengaduan::where('id_pengaduan', $id)->first();

        if ($validated) {
            $nik = Auth::user()->nik;

            if ($request->file('foto')) {
                if ($aduan->foto) {
                    Storage::delete($aduan->foto);
                }

                $path = $request->file('foto')->store('foto-aduan');

                Pengaduan::where('id_pengaduan', $id)->update(['isi_laporan' => $request->isi_laporan, 'foto' => $path]);

                return redirect('/home');
            }
            Pengaduan::where('id_pengaduan', $id)->update(['isi_laporan' => $request->isi_laporan]);
            return redirect('/home');
        }
    }

    public function updateForm(string $id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        return response(view('/edit_aduan')->with('dataPengaduan', $pengaduan));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function CancelAduan(string $id): RedirectResponse
    {
        Pengaduan::where('id_pengaduan', $id)->update(['status' => 'dibatalkan']);
        return redirect('/home');
    }
}
