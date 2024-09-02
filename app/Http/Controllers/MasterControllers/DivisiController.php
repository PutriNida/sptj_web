<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\Divisi;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DivisiController extends Controller
{

    public function index()
    {
        //get posts
        $divisi = DB::table('master_divisi')
        ->join('master_direktorat', 'master_direktorat.kd_direktorat', '=', 'master_divisi.kd_direktorat')
        ->orderBy('kd_divisi', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_divisi.index', compact('divisi'));
    }

    public function create()
    {
        $direktorat = DB::table('master_direktorat')
         ->orderBy('kd_direktorat', 'asc')
        ->get();

        return view('pages.master_divisi.create', compact('direktorat'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_divisi')->insert([
                'divisi' => $request->divisi,
                'kd_direktorat' => $request->kd_direktorat,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('divisi.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_divisi)
    {
        //get post by ID
        $direktorat = DB::table('master_direktorat')
         ->orderBy('kd_direktorat', 'asc')
        ->get();
        $divisi = DB::table('master_divisi')
        ->join('master_direktorat', 'master_direktorat.kd_direktorat', '=', 'master_divisi.kd_direktorat')
        ->where('kd_divisi', $kd_divisi)
        ->first();

        //render view with post
        return view('pages.master_divisi.edit', compact('direktorat', 'divisi'));
    }

    public function update(Request $request)
    {
        DB::table('master_divisi')
        ->where('kd_divisi', $request->kd_divisi)
        ->limit(1)
        ->update([
            'divisi' => $request->divisi,
            'kd_direktorat' => $request->kd_direktorat,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('divisi.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_divisi)
    {
        //get delete by ID
        DB::table('master_divisi')
        ->where('kd_divisi', $kd_divisi)
        ->delete();

        //render view with post
         return redirect()->route('divisi.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
