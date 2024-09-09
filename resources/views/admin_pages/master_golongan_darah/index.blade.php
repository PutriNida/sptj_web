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
                    <h6 class="m-0 font-weight-bold text-primary">Golongan Darah</h6>
                    <a href="{{ url('/master_golongan_darah/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>              
                                    <th>No</th>
                                    <th>Golongan Darah</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($goldarah as $gol)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        {{ $gol->gol_darah }}
                                </td>
                                @if($gol->status_enabled == '1') 
                                    <td>
                                        <span class="btn btn-success btn-sm">Aktif</span>
                                    </td>
                                @else 
                                    <td>
                                        <span class="btn btn-secondary btn-sm">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td>   
                                    <form action="{{ route('gol_darah.destroy', $gol->kd_gol_darah) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-circle" href="{{ route('gol_darah.edit', $gol->kd_gol_darah) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <input type="hidden" name="kd_gol_darah" value="{{ $gol->kd_gol_darah }}"/>
                                        <button type="submit" class="btn btn-danger btn-circle" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='4' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Golongan Darah Belum Tersedia!
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