<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {     
        $allmember = $this->countAllMember();
        $allberita = $this->countAllBerita();
        $allinformasi = $this->countAllInformasi();
        $allgaleri = $this->countAllGaleri();
        $totalviews = $this->countViews();
        $totallikes = $this->countLikes();
        $totaldislikes = $this->countDislikes();
        $totalcomments = $this->countComments();
        $memberbystatuskaryawan = $this->countMemberByStatusKaryawan();
        $memberbylokasikerja = $this->countMemberByLokasiKerja();
        $memberbyjeniskelamin = $this->countMemberByJenisKelamin();
        $memberbydirektorat = $this->countMemberByDirektorat();

        return view('admin_pages.dashboard', compact(
            'allmember', 
            'allberita', 
            'allinformasi', 
            'allgaleri', 
            'totalviews',
            'totallikes',
            'totaldislikes',
            'totalcomments',
            'memberbystatuskaryawan', 
            'memberbylokasikerja',
            'memberbyjeniskelamin',
            'memberbydirektorat'));
    }

    public function countAllMember(){
        $allmember = DB::table('anggota')
            ->count();
        
        return $allmember;
    }

    public function countAllBerita(){
        $allberita = DB::table('berita')
            ->count();
        
        return $allberita;
    }

    public function countAllInformasi(){
        $allinformasi = DB::table('informasi')
            ->count();
        
        return $allinformasi;
    }

    public function countAllGaleri(){
        $allgaleri = DB::table('galeri')
            ->count();
        
        return $allgaleri;
    }
    
    public function countViews(){
        $countBerita = DB::table('berita')
            ->sum('views');

        $countInformasi = DB::table('informasi')
            ->sum('views');

        $countGaleri = DB::table('galeri')
            ->sum('views') ;

        $count = $countBerita + $countInformasi + $countGaleri;
        
        return $count;
    }

    public function countLikes(){
        $countBerita = DB::table('berita')
            ->sum('likes');

        $countInformasi = DB::table('informasi')
            ->sum('likes');

        $count = $countBerita + $countInformasi;
        
        return $count;
    }

    public function countDislikes(){
        $countBerita = DB::table('berita')
            ->sum('dislikes');

        $countInformasi = DB::table('informasi')
            ->sum('dislikes');

        $count = $countBerita + $countInformasi;
        
        return $count;
    }

    public function countComments(){
        $countBerita = DB::table('histori_komentar_berita')
        ->count();
        
        return $countBerita;
    }

    public function getStatusKaryawan(){
        $statuspegawai = DB::table('master_status_karyawan')
            ->where('status_enabled','=','1')
            ->orderBy('kd_status_karyawan', 'asc')
            ->get();

        return $statuspegawai;
    }

    public function countMemberByStatusKaryawan(){
        $memberbystatuskaryawan = DB::table('anggota')
            ->select('master_status_karyawan.status_karyawan', DB::raw('count(*) as total'))            
            ->join('master_status_karyawan', 'master_status_karyawan.kd_status_karyawan', '=', 'anggota.kd_status_karyawan')
            ->groupBy('anggota.kd_status_karyawan')
            ->groupBy('master_status_karyawan.status_karyawan')
            ->get();
        return $memberbystatuskaryawan;
    }

    public function countMemberByLokasiKerja(){
        $memberbylokasikerja = DB::table('anggota')
            ->select('master_lokasi_kerja.lokasi_kerja', DB::raw('count(*) as total'))            
            ->join('master_lokasi_kerja', 'master_lokasi_kerja.kd_lokasi_kerja', '=', 'anggota.kd_lokasi_kerja')
            ->groupBy('anggota.kd_lokasi_kerja')
            ->groupBy('master_lokasi_kerja.lokasi_kerja')
            ->get();
        return $memberbylokasikerja;
    }
    
    public function countMemberByJenisKelamin(){
        $memberbyjeniskelamin = DB::table('anggota')
            ->select('master_jenis_kelamin.jenis_kelamin', DB::raw('count(*) as total'))            
            ->join('master_jenis_kelamin', 'master_jenis_kelamin.kd_jenis_kelamin', '=', 'anggota.kd_jenis_kelamin')
            ->groupBy('anggota.kd_jenis_kelamin')
            ->groupBy('master_jenis_kelamin.jenis_kelamin')
            ->get();
        return $memberbyjeniskelamin;
    }
    
    public function countMemberByDirektorat(){
        $memberbydirektorat = DB::table('anggota')
            ->select('master_direktorat.direktorat', DB::raw('count(*) as total'))            
            ->join('master_direktorat', 'master_direktorat.kd_direktorat', '=', 'anggota.kd_direktorat')
            ->groupBy('anggota.kd_direktorat')
            ->groupBy('master_direktorat.direktorat')
            ->get();
        return $memberbydirektorat;
    }
}


?>
