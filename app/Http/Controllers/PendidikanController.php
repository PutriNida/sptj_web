<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PendidikanController extends Controller
{

    public function index()
    {
        //get posts
        $pendidikan = DB::table('master_pendidikan')
        ->orderBy('kd_pendidikan', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_pendidikan.index', compact('pendidikan'));
    }

    public function create()
    {
        return view('pages.master_pendidikan.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_pendidikan')->insert([
                'pendidikan' => $request->pendidikan,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }
        

        //redirect to index
        return redirect()->route('pendidikan.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_pendidikan)
    {
        //get post by ID
        $pendidikan = DB::table('master_pendidikan')
        ->where('kd_pendidikan', $kd_pendidikan)
        ->first();

        //render view with post
        return view('pages.master_pendidikan.edit', compact('pendidikan'));
    }

    public function update(Request $request)
    {
        DB::table('master_pendidikan')
        ->where('kd_pendidikan', $request->kd_pendidikan)
        ->limit(1) 
        ->update([
            'pendidikan' => $request->pendidikan,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('pendidikan.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_pendidikan)
    {
        //get delete by ID
        DB::table('master_pendidikan')
        ->where('kd_pendidikan', $kd_pendidikan)
        ->delete();

        //render view with post
         return redirect()->route('pendidikan.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>