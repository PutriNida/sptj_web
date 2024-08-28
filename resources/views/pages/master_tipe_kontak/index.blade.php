@extends('templates/layout')
@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                {{session('success')}}
            </div>
            <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" href="{{ Session::forget('success'); }}"></a>
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                {{session('error')}}
            </div>
            <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" href="{{ Session::forget('error'); }}"></a>
        </div>
    @endif
<div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between flex-wrap">
               <div class="header-title">
                  <h4 class="card-title">Tipe Kontak</h4>
                </div>
                <div class="">
                    <a href="{{ url('/master_tipe_kontak/create') }}" class=" text-center btn btn-primary btn-icon mt-lg-0 mt-md-0 mt-3">
                        <i class="btn-inner">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </i>
                        <span>Tambah</span>
                    </a>
                </div>
            </div>
            <div class="card-body px-0">
               <div class="table-responsive">
                 <table id="datatable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr class="ligth">
                           <th>No</th>
                           <th>Tipe Kontak</th>
                           <th>Status</th>
                           <th style="min-width: 100px">Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse ($tipe_kontak as $tipe)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $tipe->tipe_kontak }}</td>
                                @if($tipe->status_enabled == '1') <td>Aktif</td>
                                @else <td>Tidak Aktif</td>
                                @endif
                                <td>
                                    <div class="flex align-items-center list-user-action">
                                        <form action="{{ route('tipe_kontak.destroy', $tipe->kd_tipe_kontak) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-sm btn-icon btn-warning" data-bs-toggle="tooltip" href="{{ route('tipe_kontak.edit', $tipe->kd_tipe_kontak) }}">
                                                <span class="btn-inner">
                                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                </span>
                                            </a>
                                            <input type="hidden" name="kd_tipe_kontak" value="{{ $tipe->kd_tipe_kontak }}"/>
                                            <input class="btn btn-sm btn-icon btn-danger" type="submit" value="Hapus" />
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24">
                                <use xlink:href="#exclamation-triangle-fill" />
                            </svg>
                            <div>
                                Data Tipe Kontak Belum Tersedia!
                            </div>
                            <a type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" href="{{ Session::forget('error'); }}"></a>
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
