@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Tentang Kami</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin_tentang_kami.update') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $tentangkami->no }}" name="no"/>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="judul">Judul:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" required maxlength="250" value="{{ $tentangkami->judul }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gambar">Gambar:</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="gambarLatest" value="{{ $tentangkami->gambar }}"/>
                                @if($tentangkami->gambar)
                                    <img src="{{ $tentangkami->gambar }}" alt="{{ $tentangkami->judul }}" style="max-width: 500px; max-height: 250px; display: block; margin-bottom: 10px;">
                                @else
                                    <p>Tidak ada gambar yang diunggah.</p>
                                @endif
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                <!-- 'accept' memastikan hanya file gambar yang dapat dipilih -->
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="content">Detail:</label>
                            <div class="col-sm-9">
                                <textarea class="content" name="detail" id="content">{{ $tentangkami->detail }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" value="publish" name="save">Simpan dan Publikasikan</button>
                            <button type="submit" class="btn btn-primary" value="draft" name="save">Simpan di Draft</button>
                            <a href="{{ url('/admin_tentang_kami') }}" class="btn btn-danger">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
