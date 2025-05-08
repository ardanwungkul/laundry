<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::all();
        return view('master.pegawai.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'no_hp' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
            ],
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'pegawai';
        $user->save();
        $pegawai = new Pegawai();
        $pegawai->nama = $request->name;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->user_id = $user->id;
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menambahkan Pegawai']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        return view('master.pegawai.edit', compact('pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $pegawai->nama = $request->name;
        $pegawai->no_hp = $request->no_hp;
        $pegawai->save();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Mengubah Pegawai']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->user->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Berhasil Menghapus Pegawai']);
    }
}
