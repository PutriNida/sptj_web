<?php

namespace App\Http\Controllers\WebsiteControllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminControllers\BeritaController;
use App\Http\Controllers\AdminControllers\InformasiController;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

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
        $allmember = DB::table('anggota')
            ->count();

        $unitkerja = DB::table('master_divisi')
            ->count();
        $lokasikerja = DB::table('master_lokasi_kerja')
            ->count();

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
            
        return view('website_pages.index', compact('lokasikerja','unitkerja','allmember','berita', 'informasi', 'medsos', 'hubungi_kami'));
    }
    
    public function berita($page)
    {
      
        $perPage = 4;
        $offset = ((int)$page - 1 ) * $perPage;

        $kategori = $requestKategori = null;
        if (isset(request()->query()['kategori'])) {
            $kategori = (int) request()->query('kategori');
        }

        $query = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('publish_at', 'IS NOT', null);

        if (!empty($kategori) && $kategori > 0) {
            $query->where('berita.kd_kategori_berita', $kategori);
        }

        $berita = $query
            ->orderBy('publish_at', 'desc')
            ->offset($offset)->limit($perPage)
            ->get();

        $countQuery = DB::table('berita')
            ->where('publish_at', 'IS NOT', null);

        if (!empty($kategori) && $kategori > 0) {
            $countQuery->where('kd_kategori_berita', $kategori);
        }

        $countberita = $countQuery->count();



        $kategori_berita = DB::table('master_kategori_berita')
            ->orderBy('kategori_berita', 'asc')
            ->get();

        $total_pages = ceil($countberita / $perPage);
        $current_page = $page;      


        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.berita', compact('berita', 'kategori_berita', 'total_pages', 'current_page', 'medsos', 'hubungi_kami'));
    }

    public function detailberita($no_berita)
    {      
        $result = app(BeritaController::class)->increaseViews($no_berita);
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('no_berita', $no_berita)
            ->first();

        $komentar = DB::table('histori_komentar_berita')
            ->where('no_berita','=',$no_berita)
            ->get();

        $latestpost = DB::table('berita')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();      

        return view('website_pages.detail_berita', compact('berita', 'medsos', 'hubungi_kami', 'komentar', 'latestpost'));
    }

    public function likeberita($no_berita)
    {      
        $result = app(BeritaController::class)->increaseLikes($no_berita);
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('no_berita', $no_berita)
            ->first();

        $komentar = DB::table('histori_komentar_berita')
            ->where('no_berita','=',$no_berita)
            ->get();

        $latestpost = DB::table('berita')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_berita', compact('berita', 'medsos', 'hubungi_kami', 'komentar', 'latestpost'));
    }

    public function dislikeberita($no_berita)
    {      
        $result = app(BeritaController::class)->increaseDislike($no_berita);
        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('no_berita', $no_berita)
            ->first();

        $komentar = DB::table('histori_komentar_berita')
            ->where('no_berita','=',$no_berita)
            ->get();

        $latestpost = DB::table('berita')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_berita', compact('berita', 'medsos', 'hubungi_kami', 'komentar', 'latestpost'));
    }

    

    public function savekomentar(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('histori_komentar_berita')->insert([
                'no_berita' => $request->no_berita,
                'nama' => $request->nama,
                'isAnonymous' => isset($request->isAnonymous) ? 1 : 0,
                'create_at' => Carbon::now()->format('Y-m-d'),
                'komentar' => $request->komentar,
                'reply_to' => $request->reply_to
            ]);
            $result = app(BeritaController::class)->increaseComment($request->no_berita);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }

        $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->where('no_berita', $request->no_berita)
            ->first();

        $latestpost = DB::table('berita')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
        
        $komentar = DB::table('histori_komentar_berita')
            ->where('no_berita','=', $request->no_berita)
            ->get();

        return view('website_pages.detail_berita', compact('berita', 'medsos', 'hubungi_kami', 'komentar', 'latestpost'));
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

        $countinformasi = DB::table('informasi')
            ->where('publish_at', 'IS NOT', null)
            ->count();

        $kategori_informasi = DB::table('master_kategori_informasi')
            ->orderBy('kategori_informasi', 'asc')
            ->get();

        $total_pages = ceil($countinformasi / 6);
        $current_page = $page;

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.informasi', compact('informasi', 'kategori_informasi', 'total_pages', 'current_page', 'medsos', 'hubungi_kami'));
    }

    public function detailinformasi($no_informasi)
    {
        $result = app(InformasiController::class)->increaseViews($no_informasi);
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->where('no_informasi', $no_informasi)
            ->first();

        $latestpost = DB::table('informasi')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_informasi', compact('informasi', 'medsos', 'hubungi_kami', 'latestpost'));
    }

    public function likeinformasi($no_informasi)
    {
        $result = app(InformasiController::class)->increaseLikes($no_informasi);
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->where('no_informasi', $no_informasi)
            ->first();
            
        $latestpost = DB::table('informasi')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_informasi', compact('informasi', 'medsos', 'hubungi_kami', 'latestpost'));
    }

    public function dislikeinformasi($no_informasi)
    {
        $result = app(InformasiController::class)->increaseDisikes($no_informasi);
        $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->where('no_informasi', $no_informasi)
            ->first();

        $latestpost = DB::table('informasi')
            ->orderBy('publish_at', 'desc')
            ->limit(5)
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.detail_informasi', compact('informasi', 'medsos', 'hubungi_kami', 'latestpost'));
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
        ->whereNot('kd_kategori_galeri', '=', 3)
            ->orderBy('kategori_galeri', 'asc')
            ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();
            
        return view('website_pages.galeri', compact('galeri', 'kategori_galeri', 'medsos', 'hubungi_kami'));
    }
    public function struktur()
    {
        $struktur_organisasi = DB::table('struktur')
            ->where('publish_at', 'IS NOT', null)
            ->orderBy('no_struktur', 'asc')
            ->get();
        
            $struktur_anggota = DB::table('struktur_anggota')
        ->join('anggota', 'anggota.no_karyawan', '=', 'struktur_anggota.no_karyawan')
        ->select('struktur_anggota.*', 'anggota.nama_lengkap')
        ->whereNotNull('publish_at')
        ->orderBy('no_struktur_anggota', 'asc')
        ->get();

        $hubungi_kami = $this->footercontact();
        $medsos = $this->footermedsos();

        return view('website_pages.struktur_organisasi', compact('struktur_organisasi', 'struktur_anggota', 'medsos', 'hubungi_kami'));
    }
    public function increaseViewsStruktur($no_struktur)
    {
        $struktur = DB::table('struktur')
            ->where('no_struktur', $no_struktur)
            ->first();

        DB::table('struktur')
            ->where('no_struktur', $no_struktur)
            ->limit(1)
            ->update([
                'views' => $struktur->views + 1
            ]);
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

    public function submitpengaduan(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jenis' => 'required|in:pengaduan,aspirasi',
            'pesan' => 'required|string',
            'nik' => 'nullable|string|max:20',
            'nohp' => 'nullable|string|max:20',
        ]);

        DB::table('pengaduan_aspirasi')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'jenis' => $request->jenis,
            'pesan' => $request->pesan,
            'nik' => $request->nik,
            'nohp' => $request->nohp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Pengaduan atau aspirasi Anda telah berhasil dikirim.');
    }


}


?>
