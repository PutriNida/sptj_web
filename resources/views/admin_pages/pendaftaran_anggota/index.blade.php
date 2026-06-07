@extends('admin_pages.templates.layout')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="font-weight-bold text-primary">Pendaftaran Online (Pending)</h4>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Karyawan</th>
                        <th>Nama</th>
                        <th>Status</th>
                        <th>Waktu</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pending as $i => $p)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $p->no_karyawan }}</td>
                            <td>{{ $p->nama_lengkap }}</td>
                            <td>{{ $p->status }}</td>
                            <td>
                                @if($p->created_at)
                                    {{ \Carbon\Carbon::parse($p->created_at)->format('Y-m-d H:i') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-center">
                                <a class="btn btn-outline-primary btn-sm" href="{{ route('admin_pendaftaran_anggota.show', $p->id) }}">
                                    Detail
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada pengajuan pending.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
