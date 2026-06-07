@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Aspirasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin_aspirasi.update', $aspirasi->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $aspirasi->id }}" name="id"/>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="nama">Nama:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" maxlength="250" value="{{ $aspirasi->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="email" name="email" autocomplete="off" required maxlength="250" value="{{ $aspirasi->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="jenis">Jenis:</label>
                            <div class="col-sm-9">
                                <select name="jenis" id="jenis" class="form-control" required>
                                    <option value="pengaduan" {{ $aspirasi->jenis == 'pengaduan' ? 'selected' : '' }}>Pengaduan</option>
                                    <option value="aspirasi" {{ $aspirasi->jenis == 'aspirasi' ? 'selected' : '' }}>Aspirasi</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="pesan">Pesan:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="pesan" name="pesan" rows="5" maxlength="2000">{{ $aspirasi->pesan }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="publish" name="save">Edit</button>
                            <!-- <button type="submit" class="btn btn-primary" value="draft" name="save">Simpan di Draft</button> -->
                            <a href="{{ url('/admin_aspirasi') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
