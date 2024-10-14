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
                    <a href="{{ url('/anggota/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
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
                                    <th>Status Karyawan</th>
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
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ $mb->status_karyawan }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            @forelse ($statuskaryawan as $status)
                                                @if($status->kd_status_karyawan != $mb->kd_status_karyawan )
                                                    <a class="dropdown-item" href="{{ route('member.edit.status', ['no_karyawan'=>$mb->no_karyawan,'kd_status_karyawan'=>$status->kd_status_karyawan]) }}">{{ $status->status_karyawan }}</a>
                                                @endif
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-circle" href="{{ route('member.edit', $mb->no_karyawan) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
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