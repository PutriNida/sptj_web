@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Hubungi Kami</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin_hubungi_kami.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- <input type="hideen" value="no_karyawan" name="no_karyawan"/> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Jenis Hubungi Kami:</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_tipe_kontak" required>
                                    <option selected="" disabled="">--Pilih--</option>
                                    @forelse ($tipe_kontak as $tk)
                                    <option value="{{ $tk->kd_tipe_kontak }}">{{ $tk->tipe_kontak }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="judul">Judul:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" maxlength="250">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="tujuan">Tujuan:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tujuan" name="tujuan" autocomplete="off" required maxlength="250">
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="publish" name="save">Simpan dan Publikasikan</button>
                            <button type="submit" class="btn btn-primary" value="draft" name="save">Simpan di Draft</button>
                            <a href="{{ url('/admin_hubungi_kami') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
