<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::all();
        return view('master.pelanggan.index', compact('data'));
    }
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with(['success' => 'Berhasil Menghapus Pelanggan']);
    }
    public function create()
    {
        return view('master.pelanggan.create');
    }
    public function store(Request $request)
    {
        $namaAsli = $request->nama_pelanggan;
        $namaFinal = $namaAsli;
        $counter = 1;

        while (Pelanggan::where('nama', $namaFinal)->exists()) {
            $namaFinal = $namaAsli . ' ' . $counter++;
        }

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $namaFinal;
        $pelanggan->no_hp = $request->nomor_pelanggan;
        $pelanggan->alamat = $request->alamat_pelanggan;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with(['success' => 'Berhasil Menambahkan Pelanggan']);
    }
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->nama = $request->nama_pelanggan;
        $pelanggan->no_hp = $request->nomor_pelanggan;
        $pelanggan->alamat = $request->alamat_pelanggan;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')->with(['success' => 'Berhasil Mengubah Pelanggan']);
    }
    public function edit(Pelanggan $pelanggan)
    {
        return view('master.pelanggan.edit', compact('pelanggan'));
    }
}
