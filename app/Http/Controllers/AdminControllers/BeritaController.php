<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\Berita;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BeritaController extends Controller
{

    public function index()
    {
        $kategoriberita = DB::table('master_kategori_berita')
         ->orderBy('kd_kategori_berita', 'asc')
        ->get();

        $berita =  DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
            ->orderBy('create_at', 'desc')
            ->get();
        
        $kd_kategori_berita = 0;
        
        return view('admin_pages.admin_berita.index', compact('kategoriberita', 'berita', 'kd_kategori_berita'));
    }

    public function search(Request $request)
    {
        $kategoriberita = DB::table('master_kategori_berita')
         ->orderBy('kd_kategori_berita', 'asc')
        ->get();

        if($request->kd_kategori_berita == ''){
            return redirect()->route('admin_berita.index');
        }else{
            $berita = DB::table('berita')
                ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
                ->join('anggota', 'anggota.no_karyawan', '=', 'berita.no_karyawan')
                ->where('berita.kd_kategori_berita', $request->kd_kategori_berita)
                ->orderBy('berita.create_at', 'desc')
                ->get();

            $kd_kategori_berita = $request->kd_kategori_berita;
        
        return view('admin_pages.admin_berita.index', compact('kategoriberita', 'berita', 'kd_kategori_berita'));
        }
      
    }

    public function create()
    {
        $kategoriberita = DB::table('master_kategori_berita')
        ->orderBy('kd_kategori_berita', 'asc')
        ->get();

        return view('admin_pages.admin_berita.create', compact('kategoriberita'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'judul_berita' => 'required|string|max:250',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $base64Image = null;
        }

        switch ($request->save) {
            case 'publish':
                try{
                    DB::table('berita')->insert([
                        'kd_kategori_berita' => $request->kd_kategori_berita,
                        'judul_berita' => $request->judul_berita,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'no_karyawan' => session('no_karyawan'),
                        'create_at' => Carbon::now()->format('Y-m-d'),
                        'publish_at' => Carbon::now()->format('Y-m-d'),
                        'views' => 0,
                        'likes' => 0,
                        'dislikes' => 0,
                        'comments' => 0
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
            
            case 'draft':
                try{
                    DB::table('berita')->insert([
                        'kd_kategori_berita' => $request->kd_kategori_berita,
                        'judul_berita' => $request->judul_berita,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'no_karyawan' => session('no_karyawan'),
                        'create_at' => Carbon::now()->format('Y-m-d'),
                        'views' => 0,
                        'likes' => 0,
                        'dislikes' => 0,
                        'comments' => 0
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
        }

        return redirect()->route('admin_berita.index')
        ->with([ $status => $message]);
    }

    public function edit($no_berita)
    {
        $kategoriberita = DB::table('master_kategori_berita')
        ->orderBy('kd_kategori_berita', 'asc')
        ->get();

        $berita = DB::table('berita')
        ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
        ->where('no_berita', $no_berita)
        ->first();

        //render view with post
        return view('admin_pages.admin_berita.edit', compact('kategoriberita', 'berita'));
    }

    public function update(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'judul_berita' => 'required|string|max:250',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $base64Image = $request->gambarLatest;
        }

        switch ($request->save) {
            case 'publish':
                try{
                    DB::table('berita')
                    ->where('no_berita', $request->no_berita)
                    ->limit(1)
                    ->update([
                        'kd_kategori_berita' => $request->kd_kategori_berita,
                        'judul_berita' => $request->judul_berita,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'update_at' => Carbon::now()->format('Y-m-d'),
                        'publish_at' => Carbon::now()->format('Y-m-d')
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
            
            case 'draft':
                try{
                    DB::table('berita')
                    ->where('no_berita', $request->no_berita)
                    ->limit(1)
                    ->update([
                        'kd_kategori_berita' => $request->kd_kategori_berita,
                        'judul_berita' => $request->judul_berita,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'update_at' => Carbon::now()->format('Y-m-d'),
                        'publish_at' => NULL
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
        }

        return redirect()->route('admin_berita.index')
        ->with([$status => $message]);
    }

    public function destroy($no_berita)
    {
        //get delete by ID
        DB::table('berita')
        ->where('no_berita', $no_berita)
        ->delete();

        //render view with post
         return redirect()->route('admin_berita.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function increaseViews($no_berita)
    {
        $berita = DB::table('berita')
        ->where('no_berita', $no_berita)
        ->first();

        DB::table('berita')
                    ->where('no_berita', $request->no_berita)
                    ->limit(1)
                    ->update([
                        'views' => $berita->views + 1
                    ]);
    }
    public function increaseLikes($no_berita)
    {
        $berita = DB::table('berita')
        ->where('no_berita', $no_berita)
        ->first();

        DB::table('berita')
                    ->where('no_berita', $request->no_berita)
                    ->limit(1)
                    ->update([
                        'likes' => $berita->views + 1
                    ]);
    }
    public function increaseDislike($no_berita)
    {
        $berita = DB::table('berita')
        ->where('no_berita', $no_berita)
        ->first();

        DB::table('berita')
                    ->where('no_berita', $request->no_berita)
                    ->limit(1)
                    ->update([
                        'dislikes' => $berita->views + 1
                    ]);
    }
}


?>
