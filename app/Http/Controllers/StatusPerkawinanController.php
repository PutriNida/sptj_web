<?php

namespace App\Http\Controllers;

use App\Models\StatusPerkawinan;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StatusPerkawinanController extends Controller
{

    public function index()
    {
        //get posts
        $status_perkawinan = DB::table('master_status_perkawinan')
        ->orderBy('kd_status_perkawinan', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_status_perkawinan.index', compact('status_perkawinan'));
    }

    public function create()
    {
        return view('pages.master_status_perkawinan.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_status_perkawinan')->insert([
                'status_perkawinan' => $request->status_perkawinan,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }
        

        //redirect to index
        return redirect()->route('status_perkawinan.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_status_perkawinan)
    {
        //get post by ID
        $status_perkawinan = DB::table('master_status_perkawinan')
        ->where('kd_status_perkawinan', $kd_status_perkawinan)
        ->first();

        //render view with post
        return view('pages.master_status_perkawinan.edit', compact('status_perkawinan'));
    }

    public function update(Request $request)
    {
        DB::table('master_status_perkawinan')
        ->where('kd_status_perkawinan', $request->kd_status_perkawinan)
        ->limit(1) 
        ->update([
            'status_perkawinan' => $request->status_perkawinan,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('status_perkawinan.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_status_perkawinan)
    {
        //get delete by ID
        DB::table('master_status_perkawinan')
        ->where('kd_status_perkawinan', $kd_status_perkawinan)
        ->delete();

        //render view with post
         return redirect()->route('status_perkawinan.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>