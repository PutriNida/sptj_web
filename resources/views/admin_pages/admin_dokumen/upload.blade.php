@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Sukses!</strong> {{ session('success') }}</span>
            <a href="{{ Session::forget('success'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @elseif(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Kesalahan!</strong> {{ session('error') }}</span>
            <a href="{{ Session::forget('error'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Upload Dokumen</h6>
            <a href="{{ route('admin_dokumen.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin_dokumen.store') }}" enctype="multipart/form-data" class="form-horizontal">
                @csrf

                <div class="form-group row mb-3">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="kd_jenis_dokumen">Jenis Dokumen</label>
                    <div class="col-sm-9">
                        <select class="form-select" id="kd_jenis_dokumen" name="kd_jenis_dokumen" required>
                            <option selected disabled value="">-- Pilih Jenis --</option>
                            @foreach($jenis as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jenis_dokumen }}</option>
                            @endforeach
                        </select>
                        @error('kd_jenis_dokumen')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="nama">Nama Dokumen</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="file">File Dokumen</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="file" name="file" required>
                        <small class="form-text text-muted">Maks 20MB. File akan disimpan beserta ekstensi, dan saat download akan terdeteksi otomatis.</small>

                        @error('file')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="control-label col-sm-3 align-self-center mb-0" for="keterangan">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Opsional">{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <div class="form-group row mb-3">
                    <label class="control-label col-sm-3 align-self-center mb-0">Opsi</label>
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="save" id="publish" value="publish" checked>
                            <label class="form-check-label" for="publish">Publikasikan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="save" id="draft" value="draft">
                            <label class="form-check-label" for="draft">Simpan sebagai Draft</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-9 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Upload</button>
                        <a href="{{ route('admin_dokumen.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop

