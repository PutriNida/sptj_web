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
                    <h6 class="m-0 font-weight-bold text-primary">Lokasi Kerja</h6>
                    <a href="{{ url('/master_lokasi_kerja/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>              
                                    <th>No</th>
                                    <th>Lokasi Kerja</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($lokasi_kerja as $stts)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        {{ $stts->lokasi_kerja }}
                                </td>
                                @if($stts->status_enabled == '1') 
                                    <td>
                                        <span class="btn btn-success btn-sm">Aktif</span>
                                    </td>
                                @else 
                                    <td>
                                        <span class="btn btn-secondary btn-sm">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td>   
                                    <form action="{{ route('lokasi_kerja.destroy', $stts->kd_lokasi_kerja) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-circle" href="{{ route('lokasi_kerja.edit', $stts->kd_lokasi_kerja) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <input type="hidden" name="kd_lokasi_kerja" value="{{ $stts->kd_lokasi_kerja }}"/>
                                        <button type="submit" class="btn btn-danger btn-circle" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='4' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Lokasi Kerja Belum Tersedia!
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