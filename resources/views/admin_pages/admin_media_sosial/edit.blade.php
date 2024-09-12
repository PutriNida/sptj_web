@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Media Sosial</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin_media_sosial.update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $media_sosial->no_media_sosial }}" name="no_media_sosial"/>
                        <!-- <input type="hideen" value="no_karyawan" name="no_karyawan"/> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Jenis Media Sosial:</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_media_sosial" required>
                                    <option selected="" disabled="">--Pilih--</option>
                                    @forelse ($mediasosial as $medsos)
                                    <option value="{{ $medsos->kd_media_sosial }}" 
                                    {{ $medsos->kd_media_sosial == $media_sosial->kd_media_sosial ? 'selected' : '' }}>
                                    {{ $medsos->media_sosial }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="username_media_sosial">Username:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="username_media_sosial" name="username_media_sosial" autocomplete="off" required maxlength="250" value="{{ $media_sosial->username_media_sosial }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="url">URL:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="url" name="url" autocomplete="off" required maxlength="250" value="{{ $media_sosial->url }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="publish" name="save">Simpan dan Publikasikan</button>
                            <button type="submit" class="btn btn-primary" value="draft" name="save">Simpan di Draft</button>
                            <a href="{{ url('/admin_media_sosial') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
