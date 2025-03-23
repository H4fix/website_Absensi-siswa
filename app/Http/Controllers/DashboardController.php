<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\local;
use App\Models\siswa;
use App\Models\absensi;
use App\Models\jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('admin.index', [
            'menu' => 'dashboard',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan
        ]);
    }

    public function dashboardSiswa()
    {
        $siswa = siswa::where('username', Auth::user()->username)->firstOrFail();
        $rekapAbsensi = absensi::where('siswa_id', $siswa->id)->with('guru')->get();

        return view('siswa.dashboard', [
            'menu' => 'dashboard',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi
        ]);
    }

    public function dashboardGuru()
    {
        $jumlahSiswa = siswa::count(); // Menghitung jumlah siswa
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLocal = local::count(); // Menghitung jumlah local
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        return view('guru.dashboard', [
            'menu' => 'dashboard',
            'jumlahSiswa' => $jumlahSiswa,
            'jumlahGuru' => $jumlahGuru,
            'jumlahLocal' => $jumlahLocal,
            'jumlahJurusan' => $jumlahJurusan
        ]);
    }
}
