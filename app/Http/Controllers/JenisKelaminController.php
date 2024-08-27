<?php

namespace App\Http\Controllers;

//import Model "JenisKelamin"
use App\Models\JenisKelamin;

//return type View
use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class JenisKelaminController extends Controller
{

    public function index()
    {
        //get posts
        $jeniskelamin = DB::table('master_jenis_kelamin')
        ->orderBy('kd_jenis_kelamin', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_jenis_kelamin.index', compact('jeniskelamin'));
    }

    public function create()
    {
        return view('pages.master_jenis_kelamin.create');
    }

    public function store(Request $request)
    {
        DB::table('master_jenis_kelamin')->insert([
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('jenis_kelamin.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($kd_jenis_kelamin)
    {
        //get post by ID
        $jeniskelamin = DB::table('master_jenis_kelamin')
        ->where('kd_jenis_kelamin', $kd_jenis_kelamin)
        ->first();

        //render view with post
        return view('pages.master_jenis_kelamin.edit', compact('jeniskelamin'));
    }

    public function update(Request $request)
    {
        DB::table('master_jenis_kelamin')
        ->where('kd_jenis_kelamin', $request->kd_jenis_kelamin)
        ->limit(1) 
        ->update([
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('jenis_kelamin.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_jenis_kelamin)
    {
        //get delete by ID
        DB::table('master_jenis_kelamin')
        ->where('kd_jenis_kelamin', $kd_jenis_kelamin)
        ->delete();

        //render view with post
         return redirect()->route('jenis_kelamin.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>