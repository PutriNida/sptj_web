@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Departemen</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('departemen.update', $departemen->kd_departemen) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="kd_departemen" value="{{ $departemen->kd_departemen }}"/>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Divisi:</label>
                                <div class="col-sm-9">
                                    <select class="form-select" id="exampleFormControlSelect1" name="kd_divisi">
                                        <option selected="" disabled="">--Pilih--</option>
                                        @forelse ($divisi as $div)
                                        <option value="{{ $div->kd_divisi }}" 
                                        {{ $div->kd_divisi == $departemen->kd_divisi ? 'selected' : '' }}>
                                            {{ $div->divisi }}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="departemen">Departemen:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="departemen" name="departemen"  autocomplete="off" value="{{ $departemen->departemen }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="{{ $departemen->status_enabled }}"
                                    {{ $departemen->status_enabled == "1" ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_enabled">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('/master_departemen') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
