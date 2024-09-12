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

    public function index()
    {
        $kategoriinformasi = DB::table('master_kategori_informasi')
         ->orderBy('kd_kategori_informasi', 'asc')
        ->get();

        $informasi =  DB::table('informasi')
            ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
            ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
            ->orderBy('create_at', 'desc')
            ->get();
        
        $kd_kategori_informasi = 0;
        
        return view('admin_pages.admin_informasi.index', compact('kategoriinformasi', 'informasi', 'kd_kategori_informasi'));
    }

    public function search(Request $request)
    {
        $kategoriinformasi = DB::table('master_kategori_informasi')
         ->orderBy('kd_kategori_informasi', 'asc')
        ->get();

        if($request->kd_kategori_informasi == ''){
            return redirect()->route('admin_informasi.index');
        }else{
            $informasi = DB::table('informasi')
                ->join('master_kategori_informasi', 'master_kategori_informasi.kd_kategori_informasi', '=', 'informasi.kd_kategori_informasi')
                ->join('anggota', 'anggota.no_karyawan', '=', 'informasi.no_karyawan')
                ->where('informasi.kd_kategori_informasi', $request->kd_kategori_informasi)
                ->orderBy('informasi.create_at', 'desc')
                ->get();

            $kd_kategori_informasi = $request->kd_kategori_informasi;
        
        return view('admin_pages.admin_informasi.index', compact('kategoriinformasi', 'informasi', 'kd_kategori_informasi'));
        }
      
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
            'judul_informasi' => 'required|string|max:250',
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
                    DB::table('informasi')->insert([
                        'kd_kategori_informasi' => $request->kd_kategori_informasi,
                        'judul_informasi' => $request->judul_informasi,
                        'content' => $request->content,
                        'gambar' => $base64Image,
                        'no_karyawan' => session('no_karyawan'),
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
                        'no_karyawan' => session('no_karyawan'),
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

        return redirect()->route('admin_informasi.index')
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
            'judul_informasi' => 'required|string|max:250',
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

        return redirect()->route('admin_informasi.index')
        ->with([$status => $message]);
    }

    public function destroy($no_informasi)
    {
        //get delete by ID
        DB::table('informasi')
        ->where('no_informasi', $no_informasi)
        ->delete();

        //render view with post
         return redirect()->route('admin_informasi.index')
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
