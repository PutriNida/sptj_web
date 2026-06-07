@extends('website_pages.templates.layout')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <h4 class="mb-3">Pendaftaran Online Anggota</h4>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('pendaftaran_anggota.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">No. Karyawan <span class="text-danger">*</span></label>
                                <input type="text" name="no_karyawan" class="form-control" value="{{ old('no_karyawan') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK <span class="text-danger">*</span></label>
                                <input type="text" name="nik" class="form-control" value="{{ old('nik') }}" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">NIK SPTJ</label>
                                <input type="text" name="nik_sptj" class="form-control" value="{{ old('nik_sptj') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jenis Kelamin</label>
                                <select name="kd_jenis_kelamin" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    @foreach(($jeniskelamin ?? []) as $jk)
                                        <option value="{{ $jk->kd_jenis_kelamin }}" {{ old('kd_jenis_kelamin') == $jk->kd_jenis_kelamin ? 'selected' : '' }}>
                                            {{ $jk->nm_jenis_kelamin ?? $jk->kd_jenis_kelamin }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status Perkawinan</label>
                                <select name="kd_status_perkawinan" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    @foreach(($statusperkawinan ?? []) as $sp)
                                        <option value="{{ $sp->kd_status_perkawinan }}" {{ old('kd_status_perkawinan') == $sp->kd_status_perkawinan ? 'selected' : '' }}>
                                            {{ $sp->nm_status_perkawinan ?? $sp->kd_status_perkawinan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Agama</label>
                                <select name="kd_agama" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    @foreach(($agama ?? []) as $ag)
                                        <option value="{{ $ag->kd_agama }}" {{ old('kd_agama') == $ag->kd_agama ? 'selected' : '' }}>
                                            {{ $ag->nm_agama ?? $ag->kd_agama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Foto Diri</label>
                                <input type="file" name="foto_diri" class="form-control" accept="image/*">
                            </div>

                            {{-- Data kerja (opsional) --}}
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Lokasi Kerja</label>
                                <select name="kd_lokasi_kerja" class="form-select">
                                    <option value="">-- Pilih --</option>
                                    @foreach(($lokasikerja ?? []) as $lk)
                                        <option value="{{ $lk->kd_lokasi_kerja }}" {{ old('kd_lokasi_kerja') == $lk->kd_lokasi_kerja ? 'selected' : '' }}>
                                            {{ $lk->nm_lokasi_kerja ?? $lk->kd_lokasi_kerja }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Status Karyawan</label>
                                <input type="text" name="kd_status_karyawan" class="form-control" value="{{ old('kd_status_karyawan') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Divisi</label>
                                <input type="text" name="kd_divisi" class="form-control" value="{{ old('kd_divisi') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Departemen</label>
                                <input type="text" name="kd_departemen" class="form-control" value="{{ old('kd_departemen') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Jabatan</label>
                                <input type="text" name="kd_jabatan" class="form-control" value="{{ old('kd_jabatan') }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Direktorat</label>
                                <input type="text" name="kd_direktorat" class="form-control" value="{{ old('kd_direktorat') }}">
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary ms-2">Batal</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
