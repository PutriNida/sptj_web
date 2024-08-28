<?php

namespace App\Http\Controllers;

use App\Models\Agama;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MasterdirektoratController extends Controller
{

    public function index()
    {
        //get posts
        $direktorat = DB::table('master_direktorat')
        ->orderBy('kd_direktorat', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_direktorat.index', compact('direktorat'));
    }

    public function create()
    {
        return view('pages.master_direktorat.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_direktorat')->insert([
                'direktorat' => $request->direktorat,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('direktorat.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_direktorat)
    {
        //get post by ID
        $direktorat = DB::table('master_direktorat')
        ->where('kd_direktorat', $kd_direktorat)
        ->first();

        //render view with post
        return view('pages.master_direktorat.edit', compact('direktorat'));
    }

    public function update(Request $request)
    {
        DB::table('master_direktorat')
        ->where('kd_direktorat', $request->kd_direktorat)
        ->limit(1)
        ->update([
            'direktorat' => $request->direktorat,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('direktorat.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_direktorat)
    {
        //get delete by ID
        DB::table('master_direktorat')
        ->where('kd_direktorat', $kd_direktorat)
        ->delete();

        //render view with post
         return redirect()->route('direktorat.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
