@extends('templates/layout')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ubah Lokasi Kerja</h4>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('lokasi_kerja.update', $lokasi_kerja->kd_lokasi_kerja) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="kd_lokasi_kerja" value="{{ $lokasi_kerja->kd_lokasi_kerja }}"/>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="lokasi_kerja">Lokasi Kerja:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="lokasi_kerja" name="lokasi_kerja"  autocomplete="off" value="{{ $lokasi_kerja->lokasi_kerja }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $lokasi_kerja->status_enabled }}"
                                        {{ $lokasi_kerja->status_enabled == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_lokasi_kerja') }}" class="btn btn-danger">Batal</a>
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
