<?php

namespace App\Http\Controllers;

use App\Models\Agama;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AgamaController extends Controller
{

    public function index()
    {
        //get posts
        $agama = DB::table('master_agama')
        ->orderBy('kd_agama', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_agama.index', compact('agama'));
    }

    public function create()
    {
        return view('pages.master_agama.create');
    }

    public function store(Request $request)
    {
        DB::table('master_agama')->insert([
            'agama' => $request->agama,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('agama.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($kd_agama)
    {
        //get post by ID
        $jeniskelamin = DB::table('master_agama')
        ->where('kd_agama', $kd_agama)
        ->first();

        //render view with post
        return view('pages.master_agama.edit', compact('jeniskelamin'));
    }

    public function update(Request $request)
    {
        DB::table('master_agama')
        ->where('kd_agama', $request->kd_agama)
        ->limit(1) 
        ->update([
            'agama' => $request->agama,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('agama.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_agama)
    {
        //get delete by ID
        DB::table('master_agama')
        ->where('kd_agama', $kd_agama)
        ->delete();

        //render view with post
         return redirect()->route('agama.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>