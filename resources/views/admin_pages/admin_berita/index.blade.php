@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Sukses!</strong> {{session('success')}}</span>
            <a href="{{ Session::forget('success'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @elseif(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Kesalahan!</strong> {{session('error')}}</span>
            <a href="{{ Session::forget('error'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Berita</h6>
                    <a href="{{ url('./website_berita/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin_berita.search') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Kategori Berita:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_kategori_berita">
                                    <option selected="" value=""  {{ $kd_kategori_berita == 0 ? 'selected' : '' }}>Semua Kategori</option>
                                    @forelse ($kategoriberita as $kb)
                                    <option value="{{ $kb->kd_kategori_berita }}" {{ $kb->kd_kategori_berita == $kd_kategori_berita ? 'selected' : '' }}>{{ $kb->kategori_berita }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <button type="submit" class="btn btn-primary" name="cari">Cari</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul Berita</th>
                                    <th>Kategori Berita</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Respon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($berita as $brt)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        {{ $brt->judul_berita }}
                                </td>
                                <td>
                                        {{ $brt->kategori_berita }}
                                </td>
                                <td>
                                        {{ $brt->create_at }}
                                </td>
                                <td>
                                        {{ $brt->publish_at }}
                                </td>
                                <td>
                                        <!-- {{ $brt->judul_berita }} -->
                                </td>
                                <td>
                                        Dilihat: {{ $brt->views }} <br>
                                        Disukai: {{ $brt->likes }} <br>
                                        Tidak Disukai: {{ $brt->dislikes }} <br>
                                        Komentar: {{ $brt->comments }}
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('berita.detail', $brt->no_berita) }}" target="_blank">Preview</a>
                                            <a class="dropdown-item" href="{{ route('admin_berita.edit', $brt->no_berita) }}">Edit</a>
                                            <form action="{{ route('admin_berita.destroy', $brt->no_berita) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="no_berita" value="{{ $brt->no_berita }}"/>
                                                <button type="submit" class="dropdown-item" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='8' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Berita Belum Tersedia!
                                </td>
                            </tr>
                        @endforelse
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
      </div>
@stop
