@extends('templates/layout') 
@section('content')
<div class="container-fluid py-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">              
                        <div class="d-flex align-items-center">
                            <h6 class="mb-0">Tambah Divisi</h6>
                        </div>
                    </div>
                    <div class="card-body">
                            <form action="{{ route('divisi.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Direktorat:</label>
                                    <div class="col-sm-9">
                                        <select class="form-select" id="exampleFormControlSelect1" name="kd_direktorat">
                                            <option selected="" disabled="">--Pilih--</option>
                                            @forelse ($direktorat as $dir)
                                            <option value="{{ $dir->kd_direktorat }}">{{ $dir->direktorat }}</option>
                                            @empty
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-3 align-self-center mb-0" for="divisi">Divisi:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="divisi" name="divisi"  autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="1">
                                        <label class="form-check-label" for="status_enabled">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ url('/master_divisi') }}" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
