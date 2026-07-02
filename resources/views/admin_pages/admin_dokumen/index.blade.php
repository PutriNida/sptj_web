@extends('admin_pages/templates/layout')
@section('content')
<div class="container-fluid py-4">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Sukses!</strong> {{ session('success') }}</span>
            <a href="{{ Session::forget('success'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @elseif(session('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Kesalahan!</strong> {{ session('error') }}</span>
            <a href="{{ Session::forget('error'); }}" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </a>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Admin Dokumen</h6>
            <div>
                <a href="{{ route('admin_dokumen.upload') }}" class="btn btn-primary btn-sm me-2">Upload</a>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th style="width:260px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dokumen as $d)
                            <tr>
                                <td>{{ $d->nama }}</td>
                                <td>{{ $d->nama_jenis_dokumen }}</td>
                                <td>{{ $d->keterangan }}</td>
                                <td>
                                    @if($d->publish)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-secondary">Draft</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="{{ route('admin_dokumen.download', $d->id) }}" class="btn btn-info btn-sm">Download</a>
                                        @if(!$d->publish)
                                            <form method="POST" action="{{ route('admin_dokumen.publish', $d->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-success btn-sm">Publish</button>
                                            </form>
                                        @endif

                                        <a href="{{ route('admin_dokumen.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form method="POST" action="{{ route('admin_dokumen.destroy', $d->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus dokumen ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada dokumen</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

