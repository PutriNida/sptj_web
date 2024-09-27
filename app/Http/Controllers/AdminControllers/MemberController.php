<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\Member;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberController extends Controller
{

    public function getJenisKelamin(){
        $jeniskelamin = DB::table('master_jenis_kelamin')
            ->where('status_enabled','=','1')
            ->orderBy('kd_jenis_kelamin', 'asc')
            ->get();

        return $jeniskelamin;
    }

    public function getStatusPerkawinan(){
        $statusperkawinan = DB::table('master_status_perkawinan')
            ->where('status_enabled','=','1')
            ->orderBy('kd_status_perkawinan', 'asc')
            ->get();

        return $statusperkawinan;
    }

    public function getAgama(){
        $agama = DB::table('master_agama')
            ->where('status_enabled','=','1')
            ->orderBy('kd_agama', 'asc')
            ->get();

        return $agama;
    }

    public function getGolonganDarah(){
        $golongandarah = DB::table('master_gol_darah')
            ->where('status_enabled','=','1')
            ->orderBy('kd_gol_darah', 'asc')
            ->get();

        return $golongandarah;
    }

    public function getJenisAlamat(){
        $jenisalamat = DB::table('master_jenis_alamat')
            ->where('status_enabled','=','1')
            ->orderBy('kd_jenis_alamat', 'desc')
            ->get();

        return $jenisalamat;
    }
   
    public function getDetailAlamat($no_karyawan){
        $detailalamat = DB::table('detail_alamat')
            ->join('master_jenis_alamat', 'master_jenis_alamat.kd_jenis_alamat', '=', 'detail_alamat.kd_jenis_alamat')
            ->where('detail_alamat.no_karyawan','=',$no_karyawan)
            ->orderBy('master_jenis_alamat.kd_jenis_alamat', 'desc')
            ->get();

        return $detailalamat;
    }

    public function getTipeKontak(){
        $tipekontak = DB::table('master_tipe_kontak')
            ->where('status_enabled','=','1')
            ->orderBy('kd_tipe_kontak', 'asc')
            ->get();

        return $tipekontak;
    }
   
    public function getDetailKontak($no_karyawan){
        $detailkontak = DB::table('detail_kontak')
            ->join('master_tipe_kontak', 'master_tipe_kontak.kd_tipe_kontak', '=', 'detail_kontak.kd_tipe_kontak')
            ->where('detail_kontak.no_karyawan','=',$no_karyawan)
            ->orderBy('master_tipe_kontak.kd_tipe_kontak', 'asc')
            ->get();

        return $detailkontak;
    }

    public function getPendidikan(){
        $pendidikan = DB::table('master_pendidikan')
            ->where('status_enabled','=','1')
            ->orderBy('kd_pendidikan', 'asc')
            ->get();

        return $pendidikan;
    }
   
    public function getDetailPendidikan($no_karyawan){
        $detailpend = DB::table('detail_pendidikan')
            ->join('master_pendidikan', 'master_pendidikan.kd_pendidikan', '=', 'detail_pendidikan.kd_pendidikan')
            ->where('detail_pendidikan.no_karyawan','=',$no_karyawan)
            ->orderBy('master_pendidikan.kd_pendidikan', 'asc')
            ->get();

        return $detailpend;
    }

    public function getHubunganKeluarga(){
        $hubungankeluarga = DB::table('master_hub_keluarga')
            ->where('status_enabled','=','1')
            ->orderBy('kd_hub_keluarga', 'asc')
            ->get();

        return $hubungankeluarga;
    }
   
    public function getDetailKeluarga($no_karyawan){
        $detailkel = DB::table('detail_keluarga')
            ->join('master_hub_keluarga', 'master_hub_keluarga.kd_hub_keluarga', '=', 'detail_keluarga.kd_hub_keluarga')
            ->where('detail_keluarga.no_karyawan','=',$no_karyawan)
            ->orderBy('master_hub_keluarga.kd_hub_keluarga', 'asc')
            ->get();

        return $detailkel;
    }

    public function getMediaSosial(){
        $mediasosial = DB::table('master_media_sosial')
            ->where('status_enabled','=','1')
            ->orderBy('kd_media_sosial', 'asc')
            ->get();

        return $mediasosial;
    }
   
    public function getDetailMedSos($no_karyawan){
        $detailmedsos = DB::table('detail_media_sosial')
            ->join('master_media_sosial', 'master_media_sosial.kd_media_sosial', '=', 'detail_media_sosial.kd_media_sosial')
            ->where('detail_media_sosial.no_karyawan','=',$no_karyawan)
            ->orderBy('master_media_sosial.kd_media_sosial', 'asc')
            ->get();

        return $detailmedsos;
    }

    public function getKartuIdentitas(){
        $kartuidentitas = DB::table('master_kartu_identitas')
            ->where('status_enabled','=','1')
            ->orderBy('kd_kartu_identitas', 'asc')
            ->get();

        return $kartuidentitas;
    }
   
    public function getDetailKartu($no_karyawan){
        $detailkartu = DB::table('detail_kartu_identitas')
            ->join('master_kartu_identitas', 'master_kartu_identitas.kd_kartu_identitas', '=', 'detail_kartu_identitas.kd_kartu_identitas')
            ->where('detail_kartu_identitas.no_karyawan','=',$no_karyawan)
            ->orderBy('master_kartu_identitas.kd_kartu_identitas', 'asc')
            ->get();

        return $detailkartu;
    }

    public function getDetailBPJS($no_karyawan){
        $detailbpjs = DB::table('detail_bpjs')
            ->where('no_karyawan','=',$no_karyawan)
            ->get();

        return $detailbpjs;
    }

    public function getLokasiKerja(){
        $lokasikerja = DB::table('master_lokasi_kerja')
            ->where('status_enabled','=','1')
            ->orderBy('kd_lokasi_kerja', 'asc')
            ->get();

        return $lokasikerja;
    }

    public function getStatusKaryawan(){
        $statuspegawai = DB::table('master_status_karyawan')
            ->where('status_enabled','=','1')
            ->orderBy('kd_status_karyawan', 'asc')
            ->get();

        return $statuspegawai;
    }

    public function getDirektorat(){
        $direktorat = DB::table('master_direktorat')
            ->where('status_enabled','=','1')
            ->orderBy('kd_direktorat', 'asc')
            ->get();

        return $direktorat;
    }

    public function getDivisi($kd_direktorat){
        $divisi = DB::table('master_divisi')
            ->where('kd_direktorat','=',$kd_direktorat)
            ->where('status_enabled','=','1')
            ->orderBy('kd_divisi', 'asc')
            ->get();

        return $divisi;
    }

    public function getDepartemen($kd_divisi){
        $departemen = DB::table('master_departemen')
            ->where('kd_divisi','=',$kd_divisi)
            ->where('status_enabled','=','1')
            ->orderBy('kd_departemen', 'asc')
            ->get();

        return $departemen;
    }

    public function getJabatan($kd_departemen){
        $jabatan = DB::table('master_jabatan')
            ->where('kd_departemen','=',$kd_departemen)
            ->where('status_enabled','=','1')
            ->orderBy('kd_jabatan', 'asc')
            ->get();

        return $jabatan;
    }

    public function index()
    {
            $member = DB::table('anggota')
            ->join('master_lokasi_kerja', 'master_lokasi_kerja.kd_lokasi_kerja', '=', 'anggota.kd_lokasi_kerja')
            ->join('master_jabatan', 'master_jabatan.kd_jabatan', '=', 'anggota.kd_jabatan')
            ->get();
        
        return view('admin_pages.admin_member.index', compact('member'));
    }

    public function create()
    {
        $jeniskelamin = $this->getJenisKelamin();
        $statusperkawinan = $this->getStatusPerkawinan();
        $agama = $this->getAgama();
        $golongandarah = $this->getGolonganDarah();
        $jenisalamat = $this->getJenisAlamat();
        $mediasosial = $this->getMediaSosial();
        $kartuidentitas = $this->getKartuIdentitas();
        $pendidikan = $this->getPendidikan();
        $hubungankeluarga = $this->getHubunganKeluarga();
        $tipekontak = $this->getTipeKontak();
        $lokasikerja = $this->getLokasiKerja();
        $statuskaryawan = $this->getStatusKaryawan();
        $direktorat = $this->getDirektorat();

        return view('admin_pages.admin_member.create', compact(
            'jeniskelamin', 
            'statusperkawinan', 
            'agama', 
            'golongandarah',
            'jenisalamat',
            'mediasosial',
            'kartuidentitas',
            'pendidikan',
            'hubungankeluarga',
            'tipekontak',
            'lokasikerja',
            'statuskaryawan',
            'direktorat'
        ));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'foto_diri' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto_diri')) {
            $file = $request->file('foto_diri');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $base64Image = null;
        }

        try{
            DB::table('anggota')->insert([
                'no_karyawan' => $request->no_karyawan,
                'nik_sptj' => $request->nik_sptj,
                'nik' => $request->nik,
                'nama_lengkap' => $request->nama_lengkap,
                'gelar_depan' => $request->gelar_depan,
                'gelar_belakang' => $request->gelar_belakang,
                'tempat_lahir' => $request->tempat_lahir,
                'tgl_lahir' => $request->tgl_lahir,
                'kd_status_perkawinan' => $request->kd_status_perkawinan,
                'jum_anak' => $request->jum_anak,
                'jum_tanggungan' => $request->jum_tanggungan,
                'kd_jenis_kelamin' => $request->kd_jenis_kelamin,
                'kd_agama' => $request->kd_agama,
                'kd_gol_darah' => $request->kd_gol_darah,
                'kd_lokasi_kerja' => $request->kd_lokasi_kerja,
                'kd_direktorat' => $request->kd_direktorat,
                'kd_divisi' => $request->kd_divisi,
                'kd_departemen' => $request->kd_departemen,
                'kd_jabatan' => $request->kd_jabatan,
                'kd_status_karyawan' => $request->kd_status_karyawan,
                'foto_diri' => $base64Image
            ]);
        
        if(!is_null($request->alamat)){
            for($i = 0; $i < count($request->kd_jenis_alamat) ; $i++){
                DB::table('detail_alamat')->insert([
                    'no_karyawan' => $request->no_karyawan,
                    'kd_jenis_alamat' => $request->kd_jenis_alamat[$i],
                    'detail_alamat' => $request->alamat[$i]]);
            }
        };

        if(!is_null($request->tujuan)){
            for($i = 0; $i < count($request->kd_tipe_kontak) ; $i++){
                DB::table('detail_kontak')->insert([
                    'no_karyawan' => $request->no_karyawan,
                    'kd_tipe_kontak' => $request->kd_tipe_kontak[$i],
                    'kontak' => $request->tujuan[$i]]);
            }
        }

        if(!is_null($request->nama_institusi)){
            for($i = 0; $i < count($request->kd_pendidikan) ; $i++){
                DB::table('detail_pendidikan')->insert([
                    'no_karyawan' => $request->no_karyawan,
                    'kd_pendidikan' => $request->kd_pendidikan[$i],
                    'nama_institusi' => $request->nama_institusi[$i],
                    'jurusan' => $request->jurusan[$i],
                    'thn_masuk' => $request->thn_masuk[$i],
                    'thn_lulus' => $request->thn_keluar[$i]]);
            }
        }

        if(!is_null($request->nama_lengkap_kel)){
            for($i = 0; $i < count($request->kd_hub_keluarga) ; $i++){
                DB::table('detail_keluarga')->insert([
                    'no_karyawan' => $request->no_karyawan,
                    'kd_hub_keluarga' => $request->kd_hub_keluarga[$i],
                    'nama_lengkap' => $request->nama_lengkap_kel[$i]]);
            }
        }

        if(!is_null($request->gambar)){
            for($i = 0; $i < count($request->kd_kartu_identitas) ; $i++){
                $fotobase64 = null;
                if ($request->hasFile('gambar')) {
                    $file = $request->file('gambar'.[$i]);
                    $imageData = file_get_contents($file->getRealPath());
                    $fotobase64 = base64_encode($imageData);
                    $mimeType = $file->getClientMimeType();
                    $fotobase64 = 'data:' . $mimeType . ';base64,' . $fotobase64;
                } else {
                    $fotobase64 = null;
                }
                DB::table('detail_kartu_identitas')->insert([
                    'no_karyawan' => $request->no_karyawan,
                    'kd_kartu_identitas' => $request->kd_kartu_identitas[$i],
                    'nomor_kartu_identitas' => $request->nomor[$i],
                    'gambar' => $fotobase64]);
            }
        };

        if(!is_null($request->username[0])){
            for($i = 0; $i < count($request->kd_media_sosial) ; $i++){
                DB::table('detail_media_sosial')->insert([
                    'no_karyawan' => $request->no_karyawan,
                    'kd_media_sosial' => $request->kd_media_sosial[$i],
                    'username' => $request->username[$i]]);
            }
        }

        if(!is_null($request->no_bpjs)){
            DB::table('detail_bpjs')->insert([
                'no_karyawan' => $request->no_karyawan,
                'no_bpjs' => $request->no_bpjs]);
        }

            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }

        //redirect to index
        return redirect()->route('member.index')
        ->with([ $status => $message]);
    }

    public function edit($no_karyawan)
    {        
        $member = DB::table('anggota')
        ->where('no_karyawan', $no_karyawan)
        ->first();        

        $jeniskelamin = $this->getJenisKelamin();
        $statusperkawinan = $this->getStatusPerkawinan();
        $agama = $this->getAgama();
        $golongandarah = $this->getGolonganDarah();
        $jenisalamat = $this->getJenisAlamat();
        $mediasosial = $this->getMediaSosial();
        $kartuidentitas = $this->getKartuIdentitas();
        $pendidikan = $this->getPendidikan();
        $hubungankeluarga = $this->getHubunganKeluarga();
        $tipekontak = $this->getTipeKontak();
        $lokasikerja = $this->getLokasiKerja();
        $statuskaryawan = $this->getStatusKaryawan();
        $direktorat = $this->getDirektorat();
        $divisi = $this->getDivisi($member->kd_direktorat);
        $departemen = $this->getDepartemen($member->kd_divisi);
        $jabatan = $this->getJabatan($member->kd_departemen);

        $detailalamat = $this->getDetailAlamat($no_karyawan);
        $detailkontak = $this->getDetailKontak($no_karyawan);
        $detailpend = $this->getDetailPendidikan($no_karyawan);
        $detailkel = $this->getDetailKeluarga($no_karyawan);
        $detailmedsos = $this->getDetailMedsos($no_karyawan);
        $detailkartu = $this->getDetailKartu($no_karyawan);
        $detailbpjs = $this->getDetailBPJS($no_karyawan);

        return view('admin_pages.admin_member.edit', compact(
            'jeniskelamin', 
            'statusperkawinan', 
            'agama', 
            'golongandarah',
            'jenisalamat',
            'mediasosial',
            'kartuidentitas',
            'pendidikan',
            'hubungankeluarga',
            'tipekontak',
            'lokasikerja',
            'statuskaryawan',
            'direktorat',
            'divisi',
            'departemen',
            'jabatan',
            'member',
            'detailalamat',
            'detailkontak',
            'detailkel',
            'detailpend',
            'detailkartu',
            'detailbpjs',
            'detailmedsos'
        ));
    }
}


?>
