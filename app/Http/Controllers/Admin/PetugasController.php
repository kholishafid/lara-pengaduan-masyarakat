<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::where('level', 'petugas')->get();
        return view('admin.petugas')->with('data_petugas', $petugas);
    }

    public function create()
    {
        return response(view('admin.add_petugas'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_petugas' => 'required|string|min:4',
            'username' => 'required|string|min:4',
            'password' => 'required|min:8',
            'telp' => 'required|integer|digits_between: 1,15'
        ]);

        if ($validated) {
            Petugas::create([
                'nama_petugas' => $request->nama_petugas,
                'telp' => $request->telp,
                'username' => $request->username,
                'password' => Hash::make($request->password)
            ]);

            return redirect('/admin/petugas')->with('alert', "Berhasil tambah petugas.");
        }
    }

    public function updateForm($id)
    {
        $petugas = Petugas::where('level', 'petugas')->where('id_petugas', $id)->first();
        return response(view('admin.edit_petugas')->with('data_petugas', $petugas));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_petugas' => 'required|string|min:4',
            'username' => 'required|string|min:4',
            'telp' => 'required|integer|digits_between: 1,15'
        ]);

        if ($validated) {
            if ($request->password) {
                Petugas::where('id_petugas', $id)->update([
                    'nama_petugas' => $request->nama_petugas,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'telp' => $request->telp,
                ]);

                return redirect('/admin/petugas')->with('alert', 'Berhasi mengedit data petugas.');
            }
            Petugas::where('id_petugas', $id)->update([
                'nama_petugas' => $request->nama_petugas,
                'username' => $request->username,
                'telp' => $request->telp,
            ]);

            return redirect('/admin/petugas')->with('alert', 'Berhasi mengedit data petugas.');
        }
    }

    public function destroy($id)
    {
        Petugas::where('id_petugas', $id)->delete();
        return redirect('/admin/petugas')->with('alert', 'Berhasil menghapus data.');
    }
}
