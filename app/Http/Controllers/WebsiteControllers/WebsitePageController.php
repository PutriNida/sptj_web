<?php

namespace App\Http\Controllers\WebsiteControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WebsitePageController extends Controller
{

    public function footercontact(){
        $hubungi_kami = DB::table('hubungi_kami')
            ->join('master_tipe_kontak', 'master_tipe_kontak.kd_tipe_kontak','=','hubungi_kami.kd_tipe_kontak')
            ->where('publish', '=', '1')          
            ->OrderBy('hubungi_kami.kd_tipe_kontak', 'desc')  
            ->get();
        
        return $hubungi_kami;
    }

    public function footermedsos(){
        $media_sosial = DB::table('media_sosial')
            ->join('master_media_sosial', 'master_media_sosial.kd_media_sosial','=','media_sosial.kd_media_sosial')
            ->where('publish', '=', '1')            
            ->get();
        
        return $media_sosial;
    }

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

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.index', compact('berita', 'informasi', 'medsos', 'hubungi_kami'));
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

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.berita', compact('berita', 'kategori_berita', 'total_pages', 'current_page', 'medsos', 'hubungi_kami'));
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

            $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_berita', compact('berita', 'kategori_berita', 'medsos', 'hubungi_kami'));
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

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.informasi', compact('informasi', 'kategori_informasi', 'total_pages', 'current_page', 'medsos', 'hubungi_kami'));
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

            $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_informasi', compact('informasi', 'kategori_informasi', 'medsos', 'hubungi_kami'));
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

            $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.galeri', compact('galeri', 'kategori_galeri', 'medsos', 'hubungi_kami'));
    }

    public function tentangkami()
    {
      
        $tentang_kami = DB::table('tentang_kami')
            ->where('publish', '=', '1')            
            ->get();
        
            $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.tentang_kami', compact('tentang_kami', 'medsos', 'hubungi_kami'));
    }

    public function hubungikami()
    {
      
        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();

        $alamat = '';
        $notelp = '';
        $email = '';
        $map = '';

        foreach($hubungi_kami as $hk){
            if($hk->kd_tipe_kontak == 1){
                $notelp = $hk->tujuan;
            }elseif($hk->kd_tipe_kontak == 3){
                $email = $hk->tujuan;
            }elseif($hk->kd_tipe_kontak == 4){
                $alamat = $hk->tujuan;
            }elseif($hk->kd_tipe_kontak == 5){
                $map = $hk->tujuan;
            }
        }

        return view('website_pages.hubungi_kami', compact('medsos', 'hubungi_kami', 'notelp', 'alamat', 'email', 'map'));
    }

}


?>
