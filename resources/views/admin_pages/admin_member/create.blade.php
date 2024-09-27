@extends('admin_pages/templates/layout') 
@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                {{ csrf_field() }}
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Diri</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataDiri()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatadiri" class="fa fa-angle-up"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="datadiri" style="display: block">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="no_karyawan">Nomor Induk Karyawan:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="no_karyawan" name="no_karyawan"  autocomplete="off" required>
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="nik_sptj">NIK SPTJ:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="nik_sptj" name="nik_sptj"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="nik">No. KTP:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nik" name="nik"  autocomplete="off" maxlength="16" minlength="16">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="nama_lengkap">Nama Lengkap:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"  autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gelar_depan">Gelar Depan:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan"  autocomplete="off">
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="gelar_belakang">Gelar Belakang:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="tempat_lahir">Tempat Lahir:</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"  autocomplete="off" required>
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="tgl_lahir">Tanggal Lahir:</label>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"  autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Jenis Kelamin:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_jenis_kelamin" required>
                                    @forelse ($jeniskelamin as $jk)
                                    <option value="{{ $jk->kd_jenis_kelamin }}">{{ $jk->jenis_kelamin }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Agama:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_agama" required>
                                    @forelse ($agama as $agm)
                                    <option value="{{ $agm->kd_agama }}">{{ $agm->agama }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Status Perkawinan:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_status_perkawinan" required>
                                    @forelse ($statusperkawinan as $sp)
                                    <option value="{{ $sp->kd_status_perkawinan }}">{{ $sp->status_perkawinan }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Golongan Darah:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_gol_darah">
                                    @forelse ($golongandarah as $gd)
                                    <option value="{{ $gd->kd_gol_darah }}">{{ $gd->gol_darah }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="jum_anak">Jumlah Anak:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="jum_anak" name="jum_anak"  autocomplete="off">
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="jum_tanggungan">Jumlah Tanggungan:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="jum_tanggungan" name="jum_tanggungan"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="foto_diri">Foto Anggota:</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="foto_diri" name="foto_diri" accept="image/*" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Alamat</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataAlamat()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondataalamat" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="dataalamat" style="display: none">
                        @forelse ($jenisalamat as $ja)
                            <input type="hidden" name="kd_jenis_alamat[]" value="{{ $ja->kd_jenis_alamat }}"/>
                            <div class="form-group row">
                                <label class="control-label col-sm-3 align-self-center mb-0" for="alamat">{{ $ja->jenis_alamat }}:</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="alamat" name="alamat[]" autocomplete="off" required></textarea>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Kontak</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataKontak()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatakontak" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="datakontak" style="display: none">
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Karir</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataKarir()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatakarir" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="datakarir" style="display: none">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Status Karyawan:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_status_karyawan" required>
                                    @forelse ($statuskaryawan as $sk)
                                    <option value="{{ $sk->kd_status_karyawan }}">{{ $sk->status_karyawan }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Lokasi Kerja:</label>
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_lokasi_kerja">
                                    @forelse ($lokasikerja as $lk)
                                    <option value="{{ $lk->kd_lokasi_kerja }}">{{ $lk->lokasi_kerja }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Direktorat:</label>
                            <div class="col-sm-6">
                                <select class="form-select" id="kd_direktorat" name="kd_direktorat" required>
                                    <option selected="" disabled="">--Pilih--</option>
                                    @forelse ($direktorat as $dir)
                                    <option value="{{ $dir->kd_direktorat }}">{{ $dir->direktorat }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Divisi:</label>
                            <div class="col-sm-6">
                                <select class="form-select" id="kd_divisi" name="kd_divisi">
                                    <option selected="" disabled="">--Pilih--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Departemen:</label>
                            <div class="col-sm-6">
                                <select class="form-select" id="kd_departemen" name="kd_departemen">
                                    <option selected="" disabled="">--Pilih--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Jabatan:</label>
                            <div class="col-sm-6">
                                <select class="form-select" id="kd_jabatan" name="kd_jabatan">
                                    <option selected="" disabled="">--Pilih--</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Pendidikan</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataPendidikan()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatapendidikan" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="datapendidikan" style="display: none"></div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Keluarga</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataKeluarga()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatakeluarga" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="datakeluarga" style="display: none"></div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Kartu Identitas</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleKartuIdentitas()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="iconkartuidentitas" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="kartuidentitas" style="display: none">
                        @forelse ($kartuidentitas as $ki)
                            <div class="form-group row">
                                <input type="hidden" name="kd_kartu_identitas[]" value="{{ $ki->kd_kartu_identitas }}"/>
                                <label class="control-label col-sm-3 align-self-center mb-0" for="kartu_identitas">{{ $ki->kartu_identitas }}:</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" id="nomor" name="nomor[]"  autocomplete="off"></textarea>
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control" id="gambar" name="gambar[]" accept="image/*">
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Media Sosial</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataMedsos()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatamedsos" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="datamedsos" style="display: none">
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data BPJS</h4>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-primary" onclick="toggleDataBPJS()"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i id="icondatabpjs" class="fa fa-angle-down"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body" id="databpjs" style="display: none">
                        <div class="form-group row">
                            <label class="control-label col-sm-3 align-self-center mb-0" for="exampleFormControlSelect1">Nomor BPJS:</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="no_bpjs" name="no_bpjs"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ url('/anggota') }}" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
