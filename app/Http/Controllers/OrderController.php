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
        $data = Order::all();
        return view('master.order.index', compact('data'));
    }
    public function create()
    {
        $pegawai = Pegawai::all();
        $pelanggan = Pelanggan::all();
        return view('master.order.create', compact('pegawai', 'pelanggan'));
    }
    public function store(Request $request)
    {
        $order = new Order();
        $order->nama_pelanggan = $request->nama_pelanggan;
        $order->alamat_pelanggan = $request->alamat_pelanggan;
        $order->tanggal = $request->tanggal;
        $order->order = $request->order;
        $order->harga = $request->harga;
        $order->save();
        return redirect()->route('order.index')->with(['success' => 'Berhasil Membuat Order']);
    }
}
