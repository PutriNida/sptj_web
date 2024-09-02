<?php

namespace App\Http\Controllers\WebsiteControllers;

use App\Http\Controllers\Controller;

use App\Models\WebsiteModels\Berita;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class BeritaController extends Controller
{

    public function index($kd_kategori_berita)
    {
        $kategoriberita = DB::table('master_kategori_berita')
         ->orderBy('kd_kategori_berita', 'asc')
        ->get();

        $berita = [];
        if($kd_kategori_berita == '0'){
            $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_anggota', '=', 'berita.no_anggota')
            ->orderBy('create_at', 'desc')
            ->get();
        }else{
            $berita = DB::table('berita')
            ->join('master_kategori_berita', 'master_kategori_berita.kd_kategori_berita', '=', 'berita.kd_kategori_berita')
            ->join('anggota', 'anggota.no_anggota', '=', 'berita.no_anggota')
            ->where()
            ->orderBy('kd_kategori_berita', $kd_kategori_berita)
            ->get();
        }
        
        //render view with posts
        return view('pages.website_berita.index', compact('kategoriberita', 'berita'));
    }

    // public function create()
    // {
    //     $kategoriberita = DB::table('master_kategori_berita')
    //      ->orderBy('kd_kategori_berita', 'asc')
    //     ->get();

    //     return view('pages.berita.create', compact('kategoriberita'));
    // }

    // public function store(Request $request)
    // {
    //     $status = '';
    //     $message = '';

    //     try{
    //         DB::table('berita')->insert([
    //             'berita' => $request->berita,
    //             'kd_direktorat' => $request->kd_direktorat,
    //             'status_enabled' => isset($request->status_enabled) ? 1 : 0
    //         ]);
    //         $status = 'success';
    //         $message = 'Data Berhasil Disimpan!';
    //     }catch(Exception $error){
    //         $status = 'error';
    //         $message = 'Data Gagal Disimpan!';
    //     }


    //     //redirect to index
    //     return redirect()->route('berita.index')
    //     ->with([ $status => $message]);
    // }

    // public function edit($kd_berita)
    // {
    //     //get post by ID
    //     $direktorat = DB::table('master_direktorat')
    //      ->orderBy('kd_direktorat', 'asc')
    //     ->get();
    //     $berita = DB::table('berita')
    //     ->join('master_direktorat', 'master_direktorat.kd_direktorat', '=', 'berita.kd_direktorat')
    //     ->where('kd_berita', $kd_berita)
    //     ->first();

    //     //render view with post
    //     return view('pages.berita.edit', compact('direktorat', 'berita'));
    // }

    // public function update(Request $request)
    // {
    //     DB::table('berita')
    //     ->where('kd_berita', $request->kd_berita)
    //     ->limit(1)
    //     ->update([
    //         'berita' => $request->berita,
    //         'kd_direktorat' => $request->kd_direktorat,
    //         'status_enabled' => isset($request->status_enabled) ? 1 : 0
    //     ]);

    //     //redirect to index
    //     return redirect()->route('berita.index')
    //     ->with(['success' => 'Data Berhasil Disimpan!']);
    // }

    // public function destroy($kd_berita)
    // {
    //     //get delete by ID
    //     DB::table('berita')
    //     ->where('kd_berita', $kd_berita)
    //     ->delete();

    //     //render view with post
    //      return redirect()->route('berita.index')
    //     ->with(['success' => 'Data Berhasil Dihapus!']);
    // }
}


?>
