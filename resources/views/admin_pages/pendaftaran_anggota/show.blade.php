@extends('admin_pages.templates.layout')
@section('content')
<div class="container-fluid py-4">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="font-weight-bold text-primary">Detail Pengajuan</h4>
        <a href="{{ route('admin_pendaftaran_anggota.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">No. Karyawan</div>
                    <div style="font-weight:700;">{{ $data->no_karyawan }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Nama Lengkap</div>
                    <div style="font-weight:700;">{{ $data->nama_lengkap }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Tempat Lahir</div>
                    <div style="font-weight:700;">{{ $data->tempat_lahir ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Tgl Lahir</div>
                    <div style="font-weight:700;">{{ $data->tgl_lahir ?? '-' }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Jenis Kelamin</div>
                    <div style="font-weight:700;">{{ $data->kd_jenis_kelamin ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Status Perkawinan</div>
                    <div style="font-weight:700;">{{ $data->kd_status_perkawinan ?? '-' }}</div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Agama</div>
                    <div style="font-weight:700;">{{ $data->kd_agama ?? '-' }}</div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="text-muted" style="font-size:12px;">Status</div>
                    <div style="font-weight:700;">{{ $data->status }}</div>
                </div>

                <div class="col-md-12 mb-3">
                    <div class="text-muted" style="font-size:12px; margin-bottom:8px;">Foto Diri</div>
                    @if(!empty($data->foto_diri))
                        <img src="{{ $data->foto_diri }}" alt="Foto Diri" style="max-width:240px; width:100%; border:1px solid #e5e7eb; border-radius:8px;">
                    @else
                        <div class="text-muted">-</div>
                    @endif
                </div>
            </div>

            <hr>

            <div class="d-flex gap-2">
                <form method="POST" action="{{ route('admin_pendaftaran_anggota.approve', $data->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                </form>

                <form method="POST" action="{{ route('admin_pendaftaran_anggota.reject', $data->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
