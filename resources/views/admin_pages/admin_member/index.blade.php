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
                    <h6 class="m-0 font-weight-bold text-primary">Anggota</h6>
                    <a href="{{ url('/master_tipe_kontak/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>              
                                    <th>No Karywan</th>
                                    <th>NIK SPTJ</th>
                                    <th>Nama</th>
                                    <th>Lokasi Kerja</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($member as $mb)
                            <tr>
                                <td>
                                        {{ $mb->no_karyawan }}
                                </td>
                                <td>
                                        {{ $mb->nik_sptj }}
                                </td>
                                <td>
                                        {{ $mb->nama_lengkap }}
                                </td>
                                <td>
                                        {{ $mb->lokasi_kerja }}
                                </td>
                                <td>
                                        {{ $mb->jabatan }}
                                </td>
                                <td>   
                                    
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='4' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Anggota Belum Tersedia!
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