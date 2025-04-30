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
}
