@extends('template-guru.layout')
@section('title', 'Data Absensi Siswa')

@section('css')
<style>
    .action-btns {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .btn-custom-width {
        width: auto;
    }
</style>
@endsection

@section('konten')
<a href="{{ route('absen.create3') }}" class="btn btn-success btn-custom-width mb-2">
    <i class="fas fa-plus"></i> Absen
</a>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Absensi Siswa
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($absensi as $absen)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $absen->siswa->nama ?? '-' }}</td>
                                <td>{{ $absen->tanggal_absen }}</td>
                                <td>{{ $absen->jam_absen }}</td>
                                <td>{{ $absen->status}}</td>
                                <td>
                                    @if($absen->foto)
                                    <img src="{{ asset('storage/foto_siswa/' . $absen->foto) }}" alt="Foto Siswa" width="100">


                                    @else
                                    Tidak Ada
                                    @endif
                                </td>
                                <td class="action-btns">
                                    <a href="{{route('absen.edit3',$absen['id'])}}" class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt' title="edit"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection