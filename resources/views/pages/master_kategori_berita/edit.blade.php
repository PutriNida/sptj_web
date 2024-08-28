@extends('templates/layout')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ubah Kategori Berita</h4>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('kategori_berita.update', $kategoriberita->kd_kategori_berita) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="kd_kategori_berita" value="{{ $kategoriberita->kd_kategori_berita }}"/>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="kategoriberita">Kategori Berita:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategoriberita" name="kategori_berita"  autocomplete="off" value="{{ $kategoriberita->kategori_berita }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $kategoriberita->status_enabled }}"
                                        {{ $kategoriberita->status_enabled == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_kategori_berita') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
