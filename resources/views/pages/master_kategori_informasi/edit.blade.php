@extends('templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Kategori Informasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('kategori_informasi.update', $kategoriinformasi->kd_kategori_informasi) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="kd_kategori_informasi" value="{{ $kategoriinformasi->kd_kategori_informasi }}"/>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="kategori_informasi">Kategori Informasi:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="kategori_informasi" name="kategori_informasi"  autocomplete="off" value="{{ $kategoriinformasi->kategori_informasi }}" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $kategoriinformasi->status_enabled }}" 
                                {{ $kategoriinformasi->status_enabled == "1" ? 'checked' : '' }}>
                                <label class="form-check-label" for="status_enabled">
                                    Aktif
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ url('/master_kategori_informasi') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop