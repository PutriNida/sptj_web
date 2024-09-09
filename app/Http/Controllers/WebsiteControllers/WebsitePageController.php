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
            ->join('anggota', 'anggota.no_anggota', '=', 'berita.no_anggota')
            ->orderBy('publish_at', 'desc')
            ->offset(0)->limit(5)
            ->get();
        
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            // ->join('anggota', 'anggota.no_anggota', '=', 'informasi.no_anggota')
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
            ->join('anggota', 'anggota.no_anggota', '=', 'berita.no_anggota')
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

    public function detail($no_berita)
    {
      
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_anggota', '=', 'berita.no_anggota')
            ->where('no_berita', $no_berita)
            ->first();
        
        $kategori_berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->select(DB::raw('count(*) as num'), 'master_kategori_berita.kategori_berita as kategori_berita')
            ->groupBy('master_kategori_berita.kategori_berita')
            ->get();
            
        return view('website_pages.detail_berita', compact('berita', 'kategori_berita'));
    }

}


?>
