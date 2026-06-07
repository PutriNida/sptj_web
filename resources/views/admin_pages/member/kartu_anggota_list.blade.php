@extends('admin_pages.templates.layout')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="font-weight-bold text-primary">Kartu Anggota</h4>
        <div>
            <small class="text-muted">Pilih anggota untuk menampilkan kartu.</small>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Karyawan</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members ?? [] as $m)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $m->no_karyawan ?? '-' }}</td>
                            <td>{{ $m->nama_lengkap ?? '-' }}</td>
                            <td>{{ $m->divisi ?? '-' }}</td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="{{ url('/kartu_anggota/detail/'.$m->no_karyawan) }}">Lihat</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data anggota</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

