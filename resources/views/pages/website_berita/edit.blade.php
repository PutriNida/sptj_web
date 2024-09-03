@extends('templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Berita</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('berita.update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $berita->no_berita }}" name="no_berita"/>
                        <!-- <input type="hideen" value="no_anggota" name="no_anggota"/> -->
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Pilih Kategori Berita:</label>
                            <div class="col-sm-9">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_kategori_berita" required>
                                    <option selected="" disabled="">--Pilih--</option>
                                    @forelse ($kategoriberita as $kb)
                                    <option value="{{ $kb->kd_kategori_berita }}" 
                                    {{ $kb->kd_kategori_berita == $berita->kd_kategori_berita ? 'selected' : '' }}>
                                    {{ $kb->kategori_berita }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="judul_berita">Judul Berita:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul_berita" name="judul_berita" autocomplete="off" required maxlength="250" value="{{ $berita->judul_berita }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gambar">Gambar:</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="gambarLatest" value="{{ $berita->gambar }}"/>
                                @if($berita->gambar)
                                    <img src="{{ $berita->gambar }}" alt="{{ $berita->judul_berita }}" style="max-width: 500px; max-height: 250px; display: block; margin-bottom: 10px;">
                                @else
                                    <p>Tidak ada ikon yang diunggah.</p>
                                @endif
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                <!-- 'accept' memastikan hanya file gambar yang dapat dipilih -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="content">Isi Berita:</label>
                            <div class="col-sm-9">
                                <textarea class="content" name="content" id="content">{{ $berita->content }}</textarea>
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
