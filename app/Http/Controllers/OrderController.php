<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        if (!request()->filterDate) {
            $data = Order::where('tanggal', 'like', date('Y-m') . '%')->get();
        } else {
            $data = Order::where('tanggal', 'like', request()->filterDate . '%')->get();
        }
        $pegawai = Pegawai::all();
        return view('master.order.index', compact('data', 'pegawai'));
    }
    public function create()
    {
        $pelanggan = Pelanggan::all();
        return view('master.order.create', compact('pelanggan'));
    }
    public function store(Request $request)
    {
        $order = new Order();

        if ($request->pelanggan_id) {
            $pelanggan = Pelanggan::find($request->pelanggan_id);
            $order->pelanggan_id = $pelanggan->id;
        } else {
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

            $order->pelanggan_id = $pelanggan->id;
        }
        $order->nama_pelanggan = $pelanggan->nama;
        $order->no_hp_pelanggan = $request->nomor_pelanggan;
        $order->alamat_pelanggan = $request->alamat_pelanggan;

        $order->tanggal = $request->tanggal;
        $order->order = $request->order;
        $order->harga = preg_replace('/[^0-9-]/', '', $request->harga);
        $order->save();
        return redirect()->route('order.index')->with(['success' => 'Berhasil Membuat Order']);
    }
    public function progress(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->pegawai_id = $request->pegawai_id;
        $order->delive = $request->delive;
        $order->status_proses = $request->status_proses;
        $order->status_pembayaran = $request->status_pembayaran;
        $order->keterangan = $request->keterangan;
        $order->save();
        return redirect()->route('order.index')->with(['success' => 'Berhasil Update Order']);
    }
}
