@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin_berita.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        {{ csrf_field() }}
                        <!-- <input type="hideen" value="no_karyawan" name="no_karyawan"/> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Kategori Berita:</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_kategori_berita" required>
                                    <option selected="" disabled="">--Pilih--</option>
                                    @forelse ($kategoriberita as $kb)
                                    <option value="{{ $kb->kd_kategori_berita }}">{{ $kb->kategori_berita }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="judul_berita">Judul Berita:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" autocomplete="off" required maxlength="250">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gambar">Gambar:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                                <!-- 'accept' memastikan hanya file gambar yang dapat dipilih -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="content">Isi Berita:</label>
                            <div class="col-sm-9">
                                <textarea class="content" name="content" id="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="publish" name="save">Simpan dan Publikasikan</button>
                            <button type="submit" class="btn btn-primary" value="draft" name="save">Simpan di Draft</button>
                            <a href="{{ url('/berita/0') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
