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
                    <h6 class="m-0 font-weight-bold text-primary">Struktur Organisasi</h6>
                    <a href="{{ route('admin_struktur_anggota.upload') }}" class="btn btn-primary btn-sm ms-auto">Upload</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Anggota</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Views</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($struktur as $str)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        <img src="{{ $str->gambar }}" alt="Struktur" style="width: 100px; height: auto;">
                                </td>
                                <td>
                                    {{ $str->nama_lengkap }}
                                </td>
                                <td>
                                        {{ $str->keterangan }}
                                </td>
                                <td>
                                        {{ $str->create_at }}
                                </td>
                                <td>
                                        {{ $str->publish_at }}
                                </td>
                                <td>
                                        {{ $str->views }}
                                </td>
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in "
                                            aria-labelledby="dropdownMenuLink">
                                            @if(!$str->publish_at)
                                            <form action="{{ route('admin_struktur_anggota.publish', $str->no_struktur) }}" method="post" style="display:inline;">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="dropdown-item">Publikasikan</button>
                                            </form>
                                            @endif
                                            <button type="button" class="dropdown-item" onclick="if(confirm('Apakah Anda yakin ingin menghapus struktur ini?')) { document.getElementById('delete-form-{{ $str->no_struktur_anggota }}').submit(); }">Hapus</button>
                                        </div>
                                    </div>
                                    <form id="delete-form-{{ $str->no_struktur_anggota }}" action="{{ route('admin_struktur_anggota.destroy', $str->no_struktur_anggota) }}" method="post" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="no_struktur" value="{{ $str->no_struktur_anggota }}"/>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='7' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Struktur Belum Tersedia!
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
