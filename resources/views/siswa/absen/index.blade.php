@extends('template-siswa.layout')
@section('title', 'Data Siswa')
@section('css')

<style>
    .action-btns {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .action-btns .btn {
        margin: 0;
    }

    .btn-custom-width {
        width: auto;
    }
</style>
@endsection
@section('konten')
<a href="{{route('absen.create')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-plus"></i> Absen</a>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Absensi {{ $siswa->nama }}
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>

                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($rekapAbsensi as $rekap)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$rekap->tanggal_absen}}</td>
                                <td>{{$rekap->jam_absen}}</td>
                                <td>{{$rekap->status}}</td>

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