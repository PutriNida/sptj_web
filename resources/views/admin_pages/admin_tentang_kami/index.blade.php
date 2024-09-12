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
                    <h6 class="m-0 font-weight-bold text-primary">Tentang Kami</h6>
                    <a href="{{ url('./admin_tentang_kami/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Dipublikasikan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                        @forelse ($tentangkami as $tk)
                            <tr>
                                <td>
                                        {{ $loop->iteration }}
                                </td>
                                <td>
                                        {{ $tk->judul }}
                                </td>
                                @if($tk->publish == '1') 
                                    <td>
                                        <span class="btn btn-success btn-sm">Ya</span>
                                    </td>
                                @else 
                                    <td>
                                        <span class="btn btn-secondary btn-sm">Tidak</span>
                                    </td>
                                @endif
                                <td>   
                                    <form action="{{ route('admin_tentang_kami.destroy', $tk->no) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-circle" href="{{ route('admin_tentang_kami.edit', $tk->no) }}">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <input type="hidden" name="no" value="{{ $tk->no }}"/>
                                        <button type="submit" class="btn btn-danger btn-circle" type="submit"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='8' class="alert alert-warning">
                                    <strong>Maaf!</strong>    Data Tentang Kami Belum Tersedia!
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
