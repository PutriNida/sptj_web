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
                <h6 class="mb-0">Divisi</h6>
                <a href="{{ url('/master_Divisi/create') }}" class="btn btn-primary btn-sm ms-auto">Tambah</a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>                     
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Direktorat</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Divisi</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                        @for ($i = $first_row; $i <= $last_row; $i++) 
                            <tr>
                                <td>
                                    <div class="d-flex px-3 py-1">
                                        {{ $i + 1 }}
                                    </div>
                                </td>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $divisi[$i]->direktorat }}</h6>
                                    </div>
                                </td>
                                 <td>
                                    <div class="d-flex px-2 py-1">
                                        <h6 class="mb-0 text-sm">{{ $divisi[$i]->divisi }}</h6>
                                    </div>
                                </td>
                                @if($divisi[$i]->status_enabled == '1')
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Aktif</span>
                                    </td>
                                @else 
                                    <td class="align-middle text-center text-sm">
                                        <span class="badge badge-sm bg-gradient-secondary">Tidak Aktif</span>
                                    </td>
                                @endif
                                <td class="align-middle text-center text-sm">   
                                    <form action="{{ route('divisi.destroy', $divisi[$i]->kd_divisi) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-warning btn-sm" href="{{ route('divisi.edit', $divisi[$i]->kd_divisi) }}">
                                            Edit
                                        </a>
                                        <input type="hidden" name="kd_divisi" value="{{ $divisi[$i]->kd_divisi }}"/>
                                        <input type="button" class="btn btn-danger btn-sm" type="submit" value="Hapus" />
                                    </form>
                                </td>
                            </tr>
                        @endfor
                     </tbody>
                  </table>
               </div>
            </div>
            <nav>
                <ul class="pagination justify-content-center">
                    @for($j = 1; $j <= $total_pages; $j++) 
                        @if($j == $page)
                            <li><a class="btn btn-primary btn-sm" href="{{ url('/master_divisi/'.$j.'/'.$rows) }}">{{ $j }}</a></li>
                        @else
                            <li><a class="btn btn-outline-primary btn-sm" href="{{ url('/master_divisi/'.$j.'/'.$rows) }}">{{ $j }}</a></li>
                        @endif
                    @endfor
                </ul>
                </nav>
         </div>
      </div>
   </div>
</div>
      </div>
@stop
