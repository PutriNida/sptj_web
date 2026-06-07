@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Sukses!</strong> {{session('success')}}</span>
            <a href="{{ Session::forget('success'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @elseif(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Kesalahan!</strong> {{session('error')}}</span>
            <a href="{{ Session::forget('error'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Upload Struktur Organisasi</h6>
                    <a href="{{ route('admin_struktur.index') }}" class="btn btn-secondary btn-sm ms-auto">Kembali</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin_struktur.store') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gambar">Gambar Struktur:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="gambar" name="gambar[]" multiple required>
                                <small class="form-text text-muted">Pilih satu atau lebih gambar untuk diupload.</small>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="keterangan">Keterangan:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan keterangan untuk gambar struktur"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="control-label col-sm-3 align-self-center mb-0">Opsi Simpan:</label>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="save" id="publish" value="publish" checked>
                                    <label class="form-check-label" for="publish">
                                        Publikasikan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="save" id="draft" value="draft">
                                    <label class="form-check-label" for="draft">
                                        Simpan sebagai Draft
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Upload</button>
                                <a href="{{ route('admin_struktur.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
