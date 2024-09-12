<?php

namespace App\Http\Controllers\WebsiteControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WebsitePageController extends Controller
{

    public function index()
    {
      
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('publish_at', 'IS NOT', null)
            ->orderBy('publish_at', 'desc')
            ->offset(0)->limit(5)
            ->get();
        
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->where('publish_at', 'IS NOT', null)
            ->orderBy('publish_at', 'desc')
            ->offset(0)->limit(5)
            ->get();
            
        return view('website_pages.index', compact('berita', 'informasi'));
    }

    public function berita($page)
    {
      
        $offset = ($page -1 ) * 6;
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('publish_at', 'IS NOT', null)
            ->orderBy('publish_at', 'desc')
            ->offset($offset)->limit(6)
            ->get();

        $kategori_berita = DB::table('master_kategori_berita')
            ->orderBy('kategori_berita', 'asc')
            ->get();

        $total_pages = ceil(count($berita) / 6);
        $current_page = $page;
            
        return view('website_pages.berita', compact('berita', 'kategori_berita', 'total_pages', 'current_page'));
    }

    public function detailberita($no_berita)
    {
      
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('no_berita', $no_berita)
            ->first();
        
        $kategori_berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->select(DB::raw('count(*) as num'), 'master_kategori_berita.kategori_berita as kategori_berita')
            ->groupBy('master_kategori_berita.kategori_berita')
            ->get();
            
        return view('website_pages.detail_berita', compact('berita', 'kategori_berita'));
    }

    public function informasi($page)
    {
      
        $offset = ($page -1 ) * 6;
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->where('publish_at', 'IS NOT', null)
            ->orderBy('publish_at', 'desc')
            ->offset($offset)->limit(6)
            ->get();

        $kategori_informasi = DB::table('master_kategori_informasi')
            ->orderBy('kategori_informasi', 'asc')
            ->get();

        $total_pages = ceil(count($informasi) / 6);
        $current_page = $page;
            
        return view('website_pages.informasi', compact('informasi', 'kategori_informasi', 'total_pages', 'current_page'));
    }

    public function detailinformasi($no_informasi)
    {
      
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->where('no_informasi', $no_informasi)
            ->first();
        
        $kategori_informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->select(DB::raw('count(*) as num'), 'master_kategori_informasi.kategori_informasi as kategori_informasi')
            ->groupBy('master_kategori_informasi.kategori_informasi')
            ->get();
            
        return view('website_pages.detail_informasi', compact('informasi', 'kategori_informasi'));
    }

    public function galeri($kd_kategori_galeri)
    {
      
        $galeri = [];
        if($kd_kategori_galeri > 0){
            $galeri = DB::table('galeri')
                ->join('master_kategori_galeri', 'master_kategori_galeri.kd_kategori_galeri', '=', 'galeri.kd_kategori_galeri')
                ->join('anggota', 'anggota.no_karyawan', '=', 'galeri.no_karyawan')
                ->where('galeri.kd_kategori_galeri', '=', $kd_kategori_galeri)
                ->where('publish_at', 'IS NOT', null)
                ->orderBy('publish_at', 'desc')
                ->get();
        }else{
            $galeri = DB::table('galeri')
                ->join('master_kategori_galeri', 'master_kategori_galeri.kd_kategori_galeri', '=', 'galeri.kd_kategori_galeri')
                ->join('anggota', 'anggota.no_karyawan', '=', 'galeri.no_karyawan')
                ->where('publish_at', 'IS NOT', null)
                ->orderBy('publish_at', 'desc')
                ->get();
        }        

        $kategori_galeri = DB::table('master_kategori_galeri')
            ->orderBy('kategori_galeri', 'asc')
            ->get();
            
        return view('website_pages.galeri', compact('galeri', 'kategori_galeri'));
    }

}


?>
