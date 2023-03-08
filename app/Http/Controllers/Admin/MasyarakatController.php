<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasyarakatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $masyarakat = Masyarakat::latest()->get();
        return view('admin.masyarakat.index')->with('data_masyarakat', $masyarakat);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $masyarakat = Masyarakat::where('nik', $id)->first();
        return view('admin.masyarakat.edit')->with('masyarakat', $masyarakat);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required|min:5',
            'nik' => 'required|digits_between:1,15',
            'telp' => 'required|digits_between:1,15',
            'username' => 'required|min:5',
        ]);

        if ($validated) {
            if ($request->password) {
                Masyarakat::where('id', $id)->update([
                    'nama' => $request->nama,
                    'nik' => $request->nik,
                    'telp' => $request->telp,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                ]);
            } else {
                Masyarakat::where('id', $id)->update([
                    'nama' => $request->nama,
                    'nik' => $request->nik,
                    'telp' => $request->telp,
                    'username' => $request->username,
                ]);
            }
            return redirect(route('kelola_masyarakat'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
