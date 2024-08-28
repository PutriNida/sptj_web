<?php

namespace App\Http\Controllers;

use App\Models\Agama;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class MasterDepartemenController extends Controller
{

    public function index()
    {
        //get posts
        $departemen = DB::table('master_departemen')
        ->orderBy('kd_departemen', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_departemen.index', compact('departemen'));
    }

    public function create()
    {
        return view('pages.master_departemen.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_departemen')->insert([
                'departemen' => $request->departemen,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('departemen.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_departemen)
    {
        //get post by ID
        $departemen = DB::table('master_departemen')
        ->where('kd_departemen', $kd_departemen)
        ->first();

        //render view with post
        return view('pages.master_departemen.edit', compact('departemen'));
    }

    public function update(Request $request)
    {
        DB::table('master_departemen')
        ->where('kd_departemen', $request->kd_departemen)
        ->limit(1)
        ->update([
            'departemen' => $request->departemen,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('departemen.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_departemen)
    {
        //get delete by ID
        DB::table('master_departemen')
        ->where('kd_departemen', $kd_departemen)
        ->delete();

        //render view with post
         return redirect()->route('departemen.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
