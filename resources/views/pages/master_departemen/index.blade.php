@extends('templates/layout') 
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
          <div class="card mb-4">
            <div class="card-header pb-0">              
              <div class="d-flex align-items-center">
                <h6 class="mb-0">Departemen</h6>
                <a href="{{ url('/master_departemen/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Divisi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Departemen</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                        @forelse ($departemen as $dep)
                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $dep->divisi }}</h6>
                                    </div>
                                </td>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $dep->departemen }}</h6>
                                    </div>
                                </td>
                                @if($dep->status_enabled == '1')
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                    </td>
                                @else 
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-secondary">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td class="align-middle text-center text-sm">   
                                    <form action="{{ route('departemen.destroy', $dep->kd_departemen) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-sm" href="{{ route('departemen.edit', $dep->kd_departemen) }}">
                                            Edit
                                        </a>
                                        <input type="hidden" name="kd_departemen" value="{{ $dep->kd_departemen }}"/>
                                        <input type="button" class="btn btn-danger btn-sm" type="submit" value="Hapus" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Maaf!</strong> Data Departemen Tidak Ditemukan!</span>
                            <a href="{{ Session::forget('error'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
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
