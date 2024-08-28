<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\LokasiKerja;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class LokasiKerjaController extends Controller
{

    public function index()
    {
        //get posts
        $lokasi_kerja = DB::table('master_lokasi_kerja')
        ->orderBy('kd_lokasi_kerja', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_lokasi_kerja.index', compact('lokasi_kerja'));
    }

    public function create()
    {
        return view('pages.master_lokasi_kerja.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_lokasi_kerja')->insert([
                'lokasi_kerja' => $request->lokasi_kerja,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('lokasi_kerja.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_lokasi_kerja)
    {
        //get post by ID
        $lokasi_kerja = DB::table('master_lokasi_kerja')
        ->where('kd_lokasi_kerja', $kd_lokasi_kerja)
        ->first();

        //render view with post
        return view('pages.master_lokasi_kerja.edit', compact('lokasi_kerja'));
    }

    public function update(Request $request)
    {
        DB::table('master_lokasi_kerja')
        ->where('kd_lokasi_kerja', $request->kd_lokasi_kerja)
        ->limit(1)
        ->update([
            'lokasi_kerja' => $request->lokasi_kerja,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('lokasi_kerja.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_lokasi_kerja)
    {
        //get delete by ID
        DB::table('master_lokasi_kerja')
        ->where('kd_lokasi_kerja', $kd_lokasi_kerja)
        ->delete();

        //render view with post
         return redirect()->route('lokasi_kerja.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
