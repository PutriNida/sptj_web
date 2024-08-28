@extends('templates/layout') 
@section('content')
<div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">              
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Edit Pendidikan</h6>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('pendidikan.update', $pendidikan->kd_pendidikan) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="kd_pendidikan" value="{{ $pendidikan->kd_pendidikan }}"/>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="pendidikan">Pendidikan:</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan"  autocomplete="off" value="{{ $pendidikan->pendidikan }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $pendidikan->status_enabled }}" 
                                        {{ $pendidikan->status_enabled == "1" ? 'checked' : '' }}>
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_pendidikan') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop