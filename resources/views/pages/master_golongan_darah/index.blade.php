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
                <h6 class="mb-0">Golongan Darah</h6>
                <a href="{{ url('/master_golongan_darah/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Golongan Darah</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                        @forelse ($goldarah as $gol)
                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        {{ $loop->iteration }}
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $gol->gol_darah }}</h6>
                                    </div>
                                </td>
                                @if($gol->status_enabled == '1') 
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                    </td>
                                @else 
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-secondary">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td class="align-middle text-center text-sm">   
                                    <form action="{{ route('gol_darah.destroy', $gol->kd_gol_darah) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-sm" href="{{ route('gol_darah.edit', $gol->kd_gol_darah) }}">
                                            Edit
                                        </a>
                                        <input type="hidden" name="kd_gol_darah" value="{{ $gol->kd_gol_darah }}"/>
                                        <input type="button" class="btn btn-danger btn-sm" type="submit" value="Hapus" />
                                    </form>
                                </td>
                            </tr>
                        @empty
                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <span class="alert-text"><strong>Maaf!</strong> Data Golongan Darah Belum Tersedia!!</span>
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