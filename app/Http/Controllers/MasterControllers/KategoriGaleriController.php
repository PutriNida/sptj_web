<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\kategorigaleri;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KategoriGaleriController extends Controller
{

    public function index()
    {
        //get posts
        $kategorigaleri = DB::table('master_kategori_galeri')
        ->orderBy('kd_kategori_galeri', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_kategori_galeri.index', compact('kategorigaleri'));
    }

    public function create()
    {
        return view('admin_pages.master_kategori_galeri.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_kategori_galeri')->insert([
                'kategori_galeri' => $request->kategori_galeri,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('kategori_galeri.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_kategori_galeri)
    {
        //get post by ID
        $kategorigaleri = DB::table('master_kategori_galeri')
        ->where('kd_kategori_galeri', $kd_kategori_galeri)
        ->first();

        //render view with post
        return view('admin_pages.master_kategori_galeri.edit', compact('kategorigaleri'));
    }

    public function update(Request $request)
    {
        DB::table('master_kategori_galeri')
        ->where('kd_kategori_galeri', $request->kd_kategori_galeri)
        ->limit(1)
        ->update([
            'kategori_galeri' => $request->kategori_galeri,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('kategori_galeri.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_kategori_galeri)
    {
        //get delete by ID
        DB::table('master_kategori_galeri')
        ->where('kd_kategori_galeri', $kd_kategori_galeri)
        ->delete();

        //render view with post
         return redirect()->route('kategori_galeri.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
