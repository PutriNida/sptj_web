@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Galeri</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($galeri as $glr)
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-bottom-primary shadow h-100 py-2">
                                <div class="card-body">                                    
                                    <div class="row no-gutters">
                                        <div class="col mr-2">
                                            <img src="{{ $glr->gambar }}" alt="Gambar" style="max-width: 100px; max-height: 100px;">
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-eye"></i> {{ $glr->views }}<br>                          
                                            <i class="fas fa-user"></i>{{ $glr->nama_lengkap }}<br><br> 
                                            @if(is_null($glr->publish_at))
                                            <form action="{{ route('admin_galeri.publish', $glr->no_galeri) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="no_galeri" value="{{ $glr->no_galeri }}"/>
                                                <button type="submit" class="btn btn-warning" type="submit">Publikasikan</button>
                                            </form>
                                            <br>
                                            @endif
                                            <form action="{{ route('admin_galeri.destroy', $glr->no_galeri) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="no_galeri" value="{{ $glr->no_galeri }}"/>
                                                <button type="submit" class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="alert alert-warning">
                            <strong>Maaf!</strong>    Foto Belum Tersedia!
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop