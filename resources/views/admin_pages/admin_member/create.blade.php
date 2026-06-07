@include('admin_pages/templates/header')
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
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_tipe_kontak[]">
                                    @if(isset($tipekontak))
                                    @forelse ($tipekontak as $tipe)
                                    <option value="{{ $tipe->kd_tipe_kontak }}">{{ $tipe->tipe_kontak }}</option>
                                    @empty
                                    @endforelse
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tujuan" name="tujuan[]" autocomplete="off">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" name="add" id="add" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
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
                    <div class="card-body" id="datapendidikan" style="display: none">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_pendidikan[]">
                                    @if(isset($pendidikan))
                                    @forelse ($pendidikan as $pend)
                                    <option value="{{ $pend->kd_pendidikan }}">{{ $pend->pendidikan }}</option>
                                    @empty
                                    @endforelse
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="institusi" name="nama_institusi[]" placeholder="Nama Institusi" autocomplete="off">
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" id="jurusan" name="jurusan[]" placeholder="Jurusan" autocomplete="off">
                            </div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3"></div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="thn_masuk" name="thn_masuk[]" placeholder="Tahun Masuk" autocomplete="off">
                            </div>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" id="thn_keluar" name="thn_keluar[]" placeholder="Tahun Keluar" autocomplete="off">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" name="addpend" id="addpend" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
                    </div>
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
                    <div class="card-body" id="datakeluarga" style="display: none">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_hub_keluarga[]">
                                    @if(isset($hubungankeluarga))
                                    @forelse ($hubungankeluarga as $hub)
                                    <option value="{{ $hub->kd_hub_keluarga }}">{{ $hub->hub_keluarga }}</option>
                                    @empty
                                    @endforelse
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama_lengkap_kel" name="nama_lengkap_kel[]" placeholder="Nama Lengkap" autocomplete="off">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" name="addkel" id="addkel" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
                    </div>
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
                                    <input type="text" class="form-control" id="nomor" name="nomor[]"  autocomplete="off">
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
                         <div class="form-group row">
                            <div class="col-sm-3">
                                <select class="form-select" id="exampleFormControlSelect1" name="kd_media_sosial[]">
                                    @if(isset($mediasosial))
                                    @forelse ($mediasosial as $ms)
                                    <option value="{{ $ms->kd_media_sosial }}">{{ $ms->media_sosial }}</option>
                                    @empty
                                    @endforelse
                                    @endif
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="username" name="username[]" placeholder="Username" autocomplete="off">
                            </div>
                            <div class="col-sm-3">
                                <button type="button" name="addmedsos" id="addmedsos" class="btn btn-success">Tambah</button>
                            </div>
                        </div>
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
<!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Limitless Innovation 2024</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ URL::asset('vendor/jquery/jquery.min.js'); }}"></script>
    <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.bundle.min.js'); }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js'); }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ URL::asset('js/sb-admin-2.min.js'); }}"></script>
    <script src="{{ URL::asset('js/jquery.richtext.min.js'); }}"></script>

    <!-- Page level plugins -->
    <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js'); }}"></script>
    <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js'); }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ URL::asset('js/demo/datatables-demo.js'); }}"></script>
</body>

</html>

<script>
$('.content').richText({

  // text formatting
  bold: true,
  italic: true,
  underline: true,

  // text alignment
  leftAlign: true,
  centerAlign: true,
  rightAlign: true,
  justify: true,

  // lists
  ol: true,
  ul: true,

  // title
  heading: true,

  // fonts
  fonts: true,
  fontList: ["Arial",
    "Arial Black",
    "Comic Sans MS",
    "Courier New",
    "Geneva",
    "Georgia",
    "Helvetica",
    "Impact",
    "Lucida Console",
    "Tahoma",
    "Times New Roman",
    "Verdana"
  ],
  fontColor: true,
  backgroundColor: true,
  fontSize: true,

  // uploads
  imageUpload: false,
  fileUpload: false,
    
  // media
  videoEmbed: false,

  // link
  urls: false,

  // tables
  table: true,

  // code
  removeStyles: true,
  code: true,

  // colors
  colors: [],

  // dropdowns
  fileHTML: '',
  imageHTML: '',

  // translations
  translations: {
    'title': 'Title',
    'white': 'White',
    'black': 'Black',
    'brown': 'Brown',
    'beige': 'Beige',
    'darkBlue': 'Dark Blue',
    'blue': 'Blue',
    'lightBlue': 'Light Blue',
    'darkRed': 'Dark Red',
    'red': 'Red',
    'darkGreen': 'Dark Green',
    'green': 'Green',
    'purple': 'Purple',
    'darkTurquois': 'Dark Turquois',
    'turquois': 'Turquois',
    'darkOrange': 'Dark Orange',
    'orange': 'Orange',
    'yellow': 'Yellow',
    'imageURL': 'Image URL',
    'fileURL': 'File URL',
    'linkText': 'Link text',
    'url': 'URL',
    'size': 'Size',
    'responsive': '<a href="https://www.jqueryscript.net/tags.php?/Responsive/">Responsive</a>',
    'text': 'Text',
    'openIn': 'Open in',
    'sameTab': 'Same tab',
    'newTab': 'New tab',
    'align': 'Align',
    'left': 'Left',
    'justify': 'Justify',
    'center': 'Center',
    'right': 'Right',
    'rows': 'Rows',
    'columns': 'Columns',
    'add': 'Add',
    'pleaseEnterURL': 'Please enter an URL',
    'videoURLnotSupported': 'Video URL not supported',
    'pleaseSelectImage': 'Please select an image',
    'pleaseSelectFile': 'Please select a file',
    'bold': 'Bold',
    'italic': 'Italic',
    'underline': 'Underline',
    'alignLeft': 'Align left',
    'alignCenter': 'Align centered',
    'alignRight': 'Align right',
    'addOrderedList': 'Ordered list',
    'addUnorderedList': 'Unordered list',
    'addHeading': 'Heading/title',
    'addFont': 'Font',
    'addFontColor': 'Font color',
    'addBackgroundColor': 'Background color',
    'addFontSize': 'Font size',
    'addImage': 'Add image',
    'addVideo': 'Add video',
    'addFile': 'Add file',
    'addURL': 'Add URL',
    'addTable': 'Add table',
    'removeStyles': 'Remove styles',
    'code': 'Show HTML code',
    'undo': 'Undo',
    'redo': 'Redo',
    'save': 'Save',
    'close': 'Close'
  },

  // privacy
  youtubeCookies: false,

  // preview
  preview: false,

  // placeholder
  placeholder: '',

  // dev settings
  useSingleQuotes: false,
  height: 0,
  heightPercentage: 0,
  adaptiveHeight: false,
  id: "",
  class: "",
  useParagraph: false,
  maxlength: 0,
  maxlengthIncludeHTML: false,
  callback: undefined,
  useTabForNext: false,
  save: false,
  saveCallback: undefined,
  saveOnBlur: 0,
  undoRedo: true

});

$("#kd_direktorat").change(function(){
    var kd_direktorat = $("#kd_direktorat").val();
	$.ajax({
		url: "/getDivisi/"+kd_direktorat,
		type: "GET",
		dataType: "json",
		contentType: "application/json;charset=utf-8",
		async: true,
        success:function(data){
            var options = "<option selected='' disabled=''>--Pilih--</option>";
            if(member != null){
              $(data).each(function(k, v){ 
                  options += "<option value='"+v.kd_divisi+"' >"+v.divisi+"</option>";
                });
            }else{
              	$(data).each(function(k, v){ 
			options += "<option value='"+v.kd_divisi+"'>"+v.divisi+"</option>";
		});
            }
	
		
		$("#kd_divisi").html(options);
        $("#kd_departemen").html("<option selected='' disabled=''>--Pilih--</option>");
        $("#kd_jabatan").html("<option selected='' disabled=''>--Pilih--</option>");
	}
	}).failed(function(){
		// something blew up, show error here
	});
});

$("#kd_divisi").change(function(){
    var kd_divisi = $("#kd_divisi").val();
	$.ajax({
		url: "/getDepartemen/"+kd_divisi,
		type: "GET",
		dataType: "json",
		contentType: "application/json;charset=utf-8",
		async: true,
        success:function(data){
            var options = "<option selected='' disabled=''>--Pilih--</option>";
		$(data).each(function(k, v){ 
			options += "<option value='"+v.kd_departemen+"'>"+v.departemen+"</option>";
		});
		
		$("#kd_departemen").html(options);
        $("#kd_jabatan").html("<option selected='' disabled=''>--Pilih--</option>");
	}
	}).failed(function(){
		// something blew up, show error here
	});
});

$("#kd_departemen").change(function(){
    var kd_departemen = $("#kd_departemen").val();
	$.ajax({
		url: "/getJabatan/"+kd_departemen,
		type: "GET",
		dataType: "json",
		contentType: "application/json;charset=utf-8",
		async: true,
        success:function(data){
            var options = "<option selected='' disabled=''>--Pilih--</option>";
		$(data).each(function(k, v){ 
			options += "<option value='"+v.kd_jabatan+"'>"+v.jabatan+"</option>";
		});
		
		$("#kd_jabatan").html(options);
	}
	}).failed(function(){
		// something blew up, show error here
	});
});

function toggleDataDiri() {
  if (document.getElementById("datadiri").style.display  === "none") {
    document.getElementById("datadiri").style.display = "block";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-up";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("icondatadiri").className = "fa fa-angle-down";
  }
}

function toggleDataAlamat() {
  if (document.getElementById("dataalamat").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "block";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-up";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
  }
}

function toggleDataKontak() {
  if (document.getElementById("datakontak").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "block";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-up";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
  }
}

function toggleDataKarir() {
  if (document.getElementById("datakarir").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "block";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-up";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
  }
}

function toggleDataPendidikan() {
  if (document.getElementById("datapendidikan").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "block";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-up";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
  }
}

function toggleDataKeluarga() {
  if (document.getElementById("datakeluarga").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "block";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-up";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
  }
}

function toggleKartuIdentitas() {
  if (document.getElementById("kartuidentitas").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "block";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-up";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
  }
}

function toggleDataMedsos() {
  if (document.getElementById("datamedsos").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "block";
    document.getElementById("databpjs").style.display = "none";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-up";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  } else {
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
  }
}

function toggleDataBPJS() {
  if (document.getElementById("databpjs").style.display  === "none") {
    document.getElementById("datadiri").style.display = "none";
    document.getElementById("dataalamat").style.display = "none";
    document.getElementById("datakontak").style.display = "none";
    document.getElementById("datakarir").style.display = "none";
    document.getElementById("datapendidikan").style.display = "none";
    document.getElementById("datakeluarga").style.display = "none";
    document.getElementById("kartuidentitas").style.display = "none";
    document.getElementById("datamedsos").style.display = "none";
    document.getElementById("databpjs").style.display = "block";

    document.getElementById("icondatadiri").className = "fa fa-angle-down";
    document.getElementById("icondataalamat").className = "fa fa-angle-down";
    document.getElementById("icondatakontak").className = "fa fa-angle-down";
    document.getElementById("icondatakarir").className = "fa fa-angle-down";
    document.getElementById("icondatapendidikan").className = "fa fa-angle-down";
    document.getElementById("icondatakeluarga").className = "fa fa-angle-down";
    document.getElementById("iconkartuidentitas").className = "fa fa-angle-down";
    document.getElementById("icondatamedsos").className = "fa fa-angle-down";
    document.getElementById("icondatabpjs").className = "fa fa-angle-up";
  } else {
    document.getElementById("databpjs").style.display = "none";
    document.getElementById("icondatabpjs").className = "fa fa-angle-down";
  }
}

var countKontak = 1;
var countPendidikan = 1;
var countKeluarga = 1;
var countMedsos = 1;

 function dynamic_kontak(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_tipe_kontak[]">';
  html += '@if(isset($tipekontak))';
  html += '@forelse ($tipekontak as $tipe)';
  html += '<option value="{{ $tipe->kd_tipe_kontak }}">{{ $tipe->tipe_kontak }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-6">';
  html += '<input type="text" class="form-control" id="tujuan" name="tujuan[]" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3"><button type="button" name="remove" id="" class="btn btn-danger remove">Hapus</button></div>';
  html += '</div>';
  $('#datakontak').append(html);
 }

 $(document).on('click', '#add', function(){
  countKontak++;
  dynamic_kontak(countKontak);
 });

 $(document).on('click', '.remove', function(){
  countKontak--;
  $(this).closest('div.form-group').remove();
 });
 
 function dynamic_medsos(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_media_sosial[]">';
  html += '@if(isset($mediasosial))';
  html += '@forelse ($mediasosial as $ms)';
  html += '<option value="{{ $ms->kd_media_sosial }}">{{ $ms->media_sosial }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-6">';
  html += '<input type="text" class="form-control" id="username" name="username[]" placeholder="Username" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3"><button type="button" name="removemedsos" id="" class="btn btn-danger remove">Hapus</button></div>';
  html += '</div>';
  $('#datamedsos').append(html);
 }

 $(document).on('click', '#addmedsos', function(){
  countMedsos++;
  dynamic_medsos(countMedsos);
 });

 $(document).on('click', '.removemedsos', function(){
  countMedsos--;
  $(this).closest('div.form-group').remove();
 });

function dynamic_pendidikan(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_pendidikan[]">';
  html += '@if(isset($pendidikan))';
  html += '@forelse ($pendidikan as $pend)';
  html += '<option value="{{ $pend->kd_pendidikan }}">{{ $pend->pendidikan }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-3">';
  html += '<input type="text" class="form-control" id="institusi" name="nama_institusi[]" placeholder="Nama Institusi" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3">';
  html += '<input type="text" class="form-control" id="jurusan" name="jurusan[]" placeholder="Jurusan" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3"></div>';
  html += '<div class="col-sm-3"></div>';
  html += '<div class="col-sm-3">';
  html += '<input type="number" class="form-control" id="thn_masuk" name="thn_masuk[]" placeholder="Tahun Masuk" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3">';
  html += '<input type="number" class="form-control" id="thn_keluar" name="thn_keluar[]" placeholder="Tahun Keluar" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3"><button type="button" name="removepend" id="" class="btn btn-danger remove">Hapus</button></div>';
  html += '</div>';
  $('#datapendidikan').append(html);
 }

 $(document).on('click', '#addpend', function(){
  countPendidikan++;
  dynamic_pendidikan(countPendidikan);
 });

 $(document).on('click', '.removepend', function(){
  countPendidikan--;
  $(this).closest('div.form-group').remove();
 });

 function dynamic_keluarga(number)
 {
  html = '<div class="form-group row">';
  html += '<div class="col-sm-3">';
  html += '<select class="form-select" id="exampleFormControlSelect1" name="kd_hub_keluarga[]">';
  html += '@if(isset($hubungankeluarga))';
  html += '@forelse ($hubungankeluarga as $hub)';
  html += '<option value="{{ $hub->kd_hub_keluarga }}">{{ $hub->hub_keluarga }}</option>';
  html += '@empty';
  html += '@endforelse';
  html += '@endif';
  html += '</select>';
  html += '</div>';
  html += '<div class="col-sm-6">';
  html += '<input type="text" class="form-control" id="nama_lengkap_kel" name="nama_lengkap_kel[]" placeholder="Nama Lengkap" autocomplete="off">';
  html += '</div>';
  html += '<div class="col-sm-3"><button type="button" name="removekel" id="" class="btn btn-danger remove">Hapus</button></div>';
  html += '</div>';
  $('#datakeluarga').append(html);
 }

 $(document).on('click', '#addkel', function(){
  countKeluarga++;
  dynamic_keluarga(countKeluarga);
 });

 $(document).on('click', '.removekel', function(){
  countKeluarga--;
  $(this).closest('div.form-group').remove();
 });

</script>
