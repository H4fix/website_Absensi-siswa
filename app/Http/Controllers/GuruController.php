<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $dataguru = Guru::all();
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data Guru',
            'dataguru' => $dataguru
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data Guru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'no_hp' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'user_id' => 'nullable',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nip.required' => 'NIP Harus Diisi',
            'no_hp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
        ]);
        $user = new User();
        $user->name = $validasi['nama'];
        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'guru'; // Default level guru
        $user->save();

        $guru = new Guru;
        $guru->nama = $validasi['nama'];
        $guru->nip = $validasi['nip'];
        $guru->no_hp = $validasi['no_hp'];
        $guru->jk = $validasi['jk'];
        $guru->tanggal_lahir = $validasi['tanggal_lahir'];
        $guru->username = $validasi['username'];
        $guru->password = $validasi['password'];
        $guru->user_id = $user->id;
        $guru->save();
        return redirect(route('guru.index'));
    }

    public function show($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.view', [
            'menu' => 'guru',
            'title' => 'Detail Data Guru',
            'guru' => $guru
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data Guru',
            'guru' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'nip' => 'nullable',
            'no_hp' => 'nullable',
            'jk' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $guru = guru::findOrFail($id);
        $guru->nama = $validasi['nama'] ?? $guru->nama;
        $guru->nip = $validasi['nip'] ?? $guru->nip;
        $guru->no_hp = $validasi['no_hp'] ?? $guru->no_hp;
        $guru->jk = $validasi['jk'] ?? $guru->jk;
        $guru->tanggal_lahir = $validasi['tanggal_lahir'] ?? $guru->tanggal_lahir;
        $guru->username = $validasi['username'] ?? $guru->username;
        if ($request->filled('password')) {
            $guru->password = bcrypt($validasi['password']);
        }

        $guru->save();

        $user = User::findOrFail($guru->user_id);
        $user->name = $validasi['nama'] ?? $user->name;
        $user->username = $validasi['username'] ?? $user->username;
        if ($request->filled('password')) {
            $user->password = bcrypt($validasi['password']);
        }
        $user->save();
        return redirect(route('guru.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = guru::findOrFail($id);

        // Hapus user yang terkait jika ada
        if ($guru->user_id) {
            User::where('id', $guru->user_id)->delete();
        }

        // Hapus guru
        $guru->delete();
        return redirect(route('guru.index'));
    }
}
