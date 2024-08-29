<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\kategoriinformasi;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KategoriInformasiController extends Controller
{

    public function index()
    {
        //get posts
        $kategoriinformasi = DB::table('master_kategori_informasi')
        ->orderBy('kd_kategori_informasi', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_kategori_informasi.index', compact('kategoriinformasi'));
    }

    public function create()
    {
        return view('pages.master_kategori_informasi.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_kategori_informasi')->insert([
                'kategori_informasi' => $request->kategori_informasi,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('kategori_informasi.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_kategori_informasi)
    {
        //get post by ID
        $kategoriinformasi = DB::table('master_kategori_informasi')
        ->where('kd_kategori_informasi', $kd_kategori_informasi)
        ->first();

        //render view with post
        return view('pages.master_kategori_informasi.edit', compact('kategoriinformasi'));
    }

    public function update(Request $request)
    {
        DB::table('master_kategori_informasi')
        ->where('kd_kategori_informasi', $request->kd_kategori_informasi)
        ->limit(1)
        ->update([
            'kategori_informasi' => $request->kategori_informasi,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('kategori_informasi.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_kategori_informasi)
    {
        //get delete by ID
        DB::table('master_kategori_informasi')
        ->where('kd_kategori_informasi', $kd_kategori_informasi)
        ->delete();

        //render view with post
         return redirect()->route('kategori_informasi.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
