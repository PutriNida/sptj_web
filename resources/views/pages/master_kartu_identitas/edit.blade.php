@extends('templates/layout')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ubah Kartu Identitas</h4>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('kartu_identitas.update', $kartuidentitas->kd_kartu_identitas) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="kd_kartu_identitas" value="{{ $kartuidentitas->kd_kartu_identitas }}"/>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="kartuidentitas">Kartu Identitas:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kartuidentitas" name="kartu_identitas"  autocomplete="off" value="{{ $kartuidentitas->kartu_identitas }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $kartuidentitas->status_enabled }}"
                                        {{ $kartuidentitas->status_enabled == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_kartu_identitas') }}" class="btn btn-danger">Batal</a>
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
