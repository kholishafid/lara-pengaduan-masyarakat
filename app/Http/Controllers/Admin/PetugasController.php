<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::where('level', 'petugas')->latest()->get();
        return view('admin.petugas.index')->with('data_petugas', $petugas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.petugas.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'telp' => 'required|digits_between:1,15',
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validated) {
            Petugas::create([
                'nama_petugas' => $request->nama,
                'telp' => $request->telp,
                'username' => $request->username,
                'password' => Hash::make($request->username),
                'level' => 'petugas'
            ]);

            return redirect(route('kelola_petugas'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Petugas::where('id_petugas', $id)->where('level', 'petugas')->first();
        return view('admin.petugas.edit')->with('petugas', $petugas);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'telp' => 'required|digits_between:1,15',
            'username' => 'required',
        ]);

        if ($validated) {
            if ($request->password) {
                Petugas::where('id_petugas', $id)->update([
                    'nama_petugas' => $request->nama,
                    'telp' => $request->telp,
                    'username' => $request->username,
                    'password' => Hash::make($request->username),
                ]);
            } else {
                Petugas::where('id_petugas', $id)->update([
                    'nama_petugas' => $request->nama,
                    'telp' => $request->telp,
                    'username' => $request->username,
                ]);
            }

            return redirect(route('kelola_petugas'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Petugas::where('id_petugas', $id)->where('level', 'petugas')->delete();
        return redirect(route('kelola_petugas'));
    }
}
