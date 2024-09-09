<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\kategoriberita;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KategoriBeritaController extends Controller
{

    public function index()
    {
        //get posts
        $kategoriberita = DB::table('master_kategori_berita')
        ->orderBy('kd_kategori_berita', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_kategori_berita.index', compact('kategoriberita'));
    }

    public function create()
    {
        return view('admin_pages.master_kategori_berita.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_kategori_berita')->insert([
                'kategori_berita' => $request->kategori_berita,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('kategori_berita.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_kategori_berita)
    {
        //get post by ID
        $kategoriberita = DB::table('master_kategori_berita')
        ->where('kd_kategori_berita', $kd_kategori_berita)
        ->first();

        //render view with post
        return view('admin_pages.master_kategori_berita.edit', compact('kategoriberita'));
    }

    public function update(Request $request)
    {
        DB::table('master_kategori_berita')
        ->where('kd_kategori_berita', $request->kd_kategori_berita)
        ->limit(1)
        ->update([
            'kategori_berita' => $request->kategori_berita,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('kategori_berita.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_kategori_berita)
    {
        //get delete by ID
        DB::table('master_kategori_berita')
        ->where('kd_kategori_berita', $kd_kategori_berita)
        ->delete();

        //render view with post
         return redirect()->route('kategori_berita.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
