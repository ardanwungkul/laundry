<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('master.user.index', compact('data'));
    }
    public function create()
    {
        return view('master.user.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
            ],
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();
        if ($request->role == 'pegawai') {
            $pegawai = new Pegawai();
            $pegawai->nama = $request->name;
            $pegawai->user_id = $user->id;
            $pegawai->save();
        }
        return redirect()->route('users.index')->with(['success' => 'Berhasil Menambahkan User']);
    }
    public function edit(User $user)
    {
        return view('master.user.edit', compact('user'));
    }
    public function update(Request $request, User $user)
    {

        $request->validate([
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('users.index')->with(['success' => 'Berhasil Mengubah User']);
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with(['success' => 'Berhasil Menghapus User']);
    }
}
