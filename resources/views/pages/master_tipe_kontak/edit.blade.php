@extends('templates/layout')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ubah Tipe Kontak</h4>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('tipe_kontak.update', $tipe_kontak->kd_tipe_kontak) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="kd_tipe_kontak" value="{{ $tipe_kontak->kd_tipe_kontak }}"/>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="tipe_kontak">Tipe Kontak:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="tipe_kontak" name="tipe_kontak"  autocomplete="off" value="{{ $tipe_kontak->tipe_kontak }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $tipe_kontak->status_enabled }}"
                                        {{ $tipe_kontak->status_enabled == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_tipe_kontak') }}" class="btn btn-danger">Batal</a>
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
