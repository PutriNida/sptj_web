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
                    <h6 class="m-0 font-weight-bold text-primary">Departemen</h6>
                    <a href="{{ url('/master_departemen/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>              
                                    <th>No</th>
                                    <th>Divisi</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($departemen as $dep)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        {{ $dep->divisi }}
                                </td>
                                <td>
                                        {{ $dep->departemen }}
                                </td>
                                @if($dep->status_enabled == '1') 
                                    <td>
                                        <span class="btn btn-success btn-sm">Aktif</span>
                                    </td>
                                @else 
                                    <td>
                                        <span class="btn btn-secondary btn-sm">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td>   
                                    <form action="{{ route('departemen.destroy', $dep->kd_departemen) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-circle" href="{{ route('departemen.edit', $dep->kd_departemen) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <input type="hidden" name="kd_departemen" value="{{ $dep->kd_departemen }}"/>
                                        <button type="submit" class="btn btn-danger btn-circle" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='5' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Departemen Belum Tersedia!
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