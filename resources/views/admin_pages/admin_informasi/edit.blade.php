@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Informasi</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('informasi.update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $informasi->no_informasi }}" name="no_informasi"/>
                        <!-- <input type="hideen" value="no_karyawan" name="no_karyawan"/> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Kategori Informasi:</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_kategori_informasi" required>
                                    <option selected="" disabled="">--Pilih--</option>
                                    @forelse ($kategoriinformasi as $kb)
                                    <option value="{{ $kb->kd_kategori_informasi }}" 
                                    {{ $kb->kd_kategori_informasi == $informasi->kd_kategori_informasi ? 'selected' : '' }}>
                                    {{ $kb->kategori_informasi }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="judul_informasi">Judul Informasi:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul_informasi" name="judul_informasi" autocomplete="off" required maxlength="250" value="{{ $informasi->judul_informasi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gambar">Gambar:</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="gambarLatest" value="{{ $informasi->gambar }}"/>
                                @if($informasi->gambar)
                                    <img src="{{ $informasi->gambar }}" alt="{{ $informasi->judul_informasi }}" style="max-width: 500px; max-height: 250px; display: block; margin-bottom: 10px;">
                                @else
                                    <p>Tidak ada gambar yang diunggah.</p>
                                @endif
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                <!-- 'accept' memastikan hanya file gambar yang dapat dipilih -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="content">Isi Informasi:</label>
                            <div class="col-sm-9">
                                <textarea class="content" name="content" id="content">{{ $informasi->content }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="publish" name="save">Simpan dan Publikasikan</button>
                            <button type="submit" class="btn btn-primary" value="draft" name="save">Simpan di Draft</button>
                            <a href="{{ url('/admin_informasi') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
