<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all();
        return response(view('admin.masyarakat.show')->with('data_masyarakat', $masyarakat));
    }

    public function create()
    {
        return response(view('admin.masyarakat.add'));
    }

    public function updateForm($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();
        return response(view('admin.masyarakat.edit')->with('data_masyarakat', $masyarakat));
    }
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'nik' => 'required|integer|digits_between: 1,16',
            'telp' => 'required|integer|digits_between: 1,15',
            'username' => 'required|string',
        ]);

        $masyarakat = Masyarakat::where('id', $id)->first();

        if ($validated) {
            if ($request->password) {
                Masyarakat::where('id', $id)->update([
                    'nama' => $request->nama,
                    'nik' => $request->nik,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'telp' => $request->telp,
                ]);

                return redirect('/admin/masyarakat')->with('alert', 'Berhasi mengedit akun masyarakat.');
            }
            Masyarakat::where('id', $id)->update([
                'nama' => $request->nama,
                'nik' => $request->nik,
                'username' => $request->username,
                'telp' => $request->telp,
            ]);

            return redirect('/admin/masyarakat')->with('alert', 'Berhasi mengedit akun masyarakat.');
        }
    }

    public function destroy($nik)
    {
        Masyarakat::where('nik', $nik)->delete();
        return redirect('/admin/masyarakat')->with('alert', 'Berhasil menghapus akun masyarakat.');
    }
}
