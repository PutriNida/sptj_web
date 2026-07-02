@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Dokumen</h6>
            <a href="{{ route('jenis_dokumen.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

        <div class="card-body">
            <form action="{{ route('jenis_dokumen.store') }}" method="POST" class="form-horizontal">
                @csrf

                <div class="form-group row mb-3">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="nama_jenis_dokumen">Nama Jenis Dokumen</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama_jenis_dokumen" name="nama_jenis_dokumen" value="{{ old('nama_jenis_dokumen') }}" required>
                        @error('nama_jenis_dokumen')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('jenis_dokumen.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

