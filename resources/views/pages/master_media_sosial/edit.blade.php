@extends('templates/layout')
@section('content')
<div class="container-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Ubah Media Sosial</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('media_sosial.update', $mediasosial->kd_media_sosial) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="kd_media_sosial" value="{{ $mediasosial->kd_media_sosial }}"/>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="mediasosial">Media Sosial:</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="mediasosial" name="media_sosial" autocomplete="off" value="{{ $mediasosial->media_sosial }}" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="ikon_media_sosial">Ikon Media Sosial:</label>
                                <div class="col-sm-9">
                                    @if($mediasosial->ikon_media_sosial)
                                        <img src="{{ $mediasosial->ikon_media_sosial }}" alt="Ikon Media Sosial" style="max-width: 100px; max-height: 100px; display: block; margin-bottom: 10px;">
                                    @else
                                        <p>Tidak ada ikon yang diunggah.</p>
                                    @endif
                                    <input type="file" class="form-control" id="ikon_media_sosial" name="ikon_media_sosial">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="status_enabled" id="status_enabled" value="1" {{ $mediasosial->status_enabled == '1' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status_enabled">
                                        Aktif
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url('/master_media_sosial') }}" class="btn btn-danger">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
