@extends('admin_pages/templates/layout')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Dokumen</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin_dokumen.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $dokumen->id }}">
                    <div class="form-group">
                        <label for="kd_jenis_dokumen">Jenis Dokumen</label>
                        <select class="form-control" id="kd_jenis_dokumen" name="kd_jenis_dokumen" required>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id }}" {{ $dokumen->kd_jenis_dokumen == $j->id ? 'selected' : '' }}>
                                    {{ $j->nama_jenis_dokumen }}
                                </option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="nama">Nama Dokumen</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $dokumen->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="file">File Dokumen (Opsional, jika ingin mengganti file)</label>
                        <input type="file" class="form-control-file" id="file" name="file">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan">{{ $dokumen->keterangan }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="publish">Status Publish</label>
                        <select class="form-control" id="publish" name="publish" required>
                            <option value="0" {{ $dokumen->publish ==0 ? 'selected' : '' }}>Draft</option>
                            <option value="1" {{ $dokumen->publish ==1 ? 'selected' : '' }}>Publish</option>
                        </select>  
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('admin_dokumen.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
    @stop