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
                    <h6 class="m-0 font-weight-bold text-primary">Informasi</h6>
                    <a href="{{ url('./website_informasi/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin_informasi.search') }}">
                        {{ csrf_field() }}
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Kategori Informasi:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_kategori_informasi">
                                    <option selected="" value=""  {{ $kd_kategori_informasi == 0 ? 'selected' : '' }}>Semua Kategori</option>
                                    @forelse ($kategoriinformasi as $kb)
                                    <option value="{{ $kb->kd_kategori_informasi }}"  {{ $kb->kd_kategori_informasi == $kd_kategori_informasi ? 'selected' : '' }}>{{ $kb->kategori_informasi }}</option>
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
                                    <th>Judul Informasi</th>
                                    <th>Kategori Informasi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Dibuat Oleh</th>
                                    <th>Respon</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($informasi as $info)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        {{ $info->judul_informasi }}
                                </td>
                                <td>
                                        {{ $info->kategori_informasi }}
                                </td>
                                <td>
                                        {{ $info->create_at }}
                                </td>
                                <td>
                                        {{ $info->publish_at }}
                                </td>
                                <td>
                                        {{ $info->nama_lengkap }}
                                </td>
                                <td>
                                        Dilihat: {{ $info->views }} <br>
                                        Disukai: {{ $info->likes }} <br>
                                        Tidak Disukai: {{ $info->dislikes }}
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('informasi.detail', $info->no_informasi) }}" target="_blank">Preview</a>
                                            <a class="dropdown-item" href="{{ route('admin_informasi.edit', $info->no_informasi) }}">Edit</a>
                                            <form action="{{ route('admin_informasi.destroy', $info->no_informasi) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="no_informasi" value="{{ $info->no_informasi }}"/>
                                                <button type="submit" class="dropdown-item" type="submit">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='8' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data informasi Belum Tersedia!
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
