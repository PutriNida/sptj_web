@extends('templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Divisi</h6>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('jabatan.update', $jabatan->kd_jabatan) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="kd_jabatan" value="{{ $jabatan->kd_jabatan }}"/>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Departemen:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="exampleFormControlSelect1" name="kd_departemen">
                                            <option selected="" disabled="">--Pilih--</option>
                                            @forelse ($departemen as $dep)
                                            <option value="{{ $dep->kd_departemen }}" 
                                            {{ $dep->kd_departemen == $jabatan->kd_departemen ? 'selected' : '' }}>
                                                {{ $dep->departemen }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="jabatan">Jabatan:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jabatan" name="jabatan"  autocomplete="off" value="{{ $jabatan->jabatan }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $jabatan->status_enabled }}"
                                        {{ $jabatan->status_enabled == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_jabatan') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
