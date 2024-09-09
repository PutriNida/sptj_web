<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\Informasi;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InformasiController extends Controller
{

    public function index($kd_kategori_informasi)
    {
        $kategoriinformasi = DB::table('master_kategori_informasi')
         ->orderBy('kd_kategori_informasi', 'asc')
        ->get();

        $informasi = [];
        if($kd_kategori_informasi == '0' || is_empty($kd_kategori_informasi)){
            $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            // ->join('anggota', 'anggota.no_anggota', '=', 'informasi.no_anggota')
            ->orderBy('create_at', 'desc')
            ->get();
        }else{
            $informasi = DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            // ->join('anggota', 'anggota.no_anggota', '=', 'informasi.no_anggota')
            ->where('informasi.kd_kategori_informasi', $kd_kategori_informasi)
            ->orderBy('informasi.kd_kategori_informasi', 'asc')
            ->get();
        }
        
        return view('admin_pages.admin_informasi.index', compact('kategoriinformasi', 'informasi'));
    }

    public function create()
    {
        $kategoriinformasi = DB::table('master_kategori_informasi')
        ->orderBy('kd_kategori_informasi', 'asc')
        ->get();

        return view('admin_pages.admin_informasi.create', compact('kategoriinformasi'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'judul_informasi' => 'required|string|max:250'
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
                    DB::table('informasi')->insert([
                        'kd_kategori_informasi' => $request->kd_kategori_informasi,
                        'judul_informasi' => $request->judul_informasi,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'create_at' => Carbon::now()->format('Y-m-d'),
                        'publish_at' => Carbon::now()->format('Y-m-d'),
                        'views' => 0,
                        'likes' => 0,
                        'dislikes' => 0
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
                    DB::table('informasi')->insert([
                        'kd_kategori_informasi' => $request->kd_kategori_informasi,
                        'judul_informasi' => $request->judul_informasi,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'create_at' => Carbon::now()->format('Y-m-d'),
                        'views' => 0,
                        'likes' => 0,
                        'dislikes' => 0
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
        }

        return redirect()->route('informasi.index', '0')
        ->with([ $status => $message]);
    }

    public function edit($no_informasi)
    {
        $kategoriinformasi = DB::table('master_kategori_informasi')
        ->orderBy('kd_kategori_informasi', 'asc')
        ->get();

        $informasi = DB::table('informasi')
        ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
        ->where('no_informasi', $no_informasi)
        ->first();

        //render view with post
        return view('admin_pages.admin_informasi.edit', compact('kategoriinformasi', 'informasi'));
    }

    public function update(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'judul_informasi' => 'required|string|max:250'
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
                    DB::table('informasi')
                    ->where('no_informasi', $request->no_informasi)
                    ->limit(1)
                    ->update([
                        'kd_kategori_informasi' => $request->kd_kategori_informasi,
                        'judul_informasi' => $request->judul_informasi,
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
                    DB::table('informasi')
                    ->where('no_informasi', $request->no_informasi)
                    ->limit(1)
                    ->update([
                        'kd_kategori_informasi' => $request->kd_kategori_informasi,
                        'judul_informasi' => $request->judul_informasi,
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

        return redirect()->route('informasi.index', '0')
        ->with([$status => $message]);
    }

    public function destroy($no_informasi)
    {
        //get delete by ID
        DB::table('informasi')
        ->where('no_informasi', $no_informasi)
        ->delete();

        //render view with post
         return redirect()->route('informasi.index', '0')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function increaseViews($no_informasi)
    {
        $informasi = DB::table('informasi')
        ->where('no_informasi', $no_informasi)
        ->first();

        DB::table('informasi')
                    ->where('no_informasi', $request->no_informasi)
                    ->limit(1)
                    ->update([
                        'kd_kategori_informasi' => $request->kd_kategori_informasi,
                        'judul_informasi' => $request->judul_informasi,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'update_at' => Carbon::now()->format('Y-m-d'),
                        'publish_at' => Carbon::now()->format('Y-m-d')
                    ]);
    }
}


?>
