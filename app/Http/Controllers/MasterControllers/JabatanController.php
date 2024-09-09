<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\Jabatan;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class JabatanController extends Controller
{

    public function index()
    {
        //get posts
        $jabatan = DB::table('master_jabatan')
        ->join('master_departemen', 'master_departemen.kd_departemen', '=', 'master_jabatan.kd_departemen')
        ->orderBy('kd_jabatan', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_jabatan.index', compact('jabatan'));
    }

    public function create()
    {
        $departemen = DB::table('master_departemen')
         ->orderBy('kd_departemen', 'asc')
        ->get();

        return view('admin_pages.master_jabatan.create', compact('departemen'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_jabatan')->insert([
                'jabatan' => $request->jabatan,
                'kd_departemen' => $request->kd_departemen,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('jabatan.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_jabatan)
    {
        $departemen = DB::table('master_departemen')
         ->orderBy('kd_departemen', 'asc')
        ->get();
        $jabatan = DB::table('master_jabatan')
        ->join('master_departemen', 'master_departemen.kd_departemen', '=', 'master_jabatan.kd_departemen')
        ->where('kd_jabatan', $kd_jabatan)
        ->first();

        //render view with post
        return view('admin_pages.master_jabatan.edit', compact('departemen','jabatan'));
    }

    public function update(Request $request)
    {
        DB::table('master_jabatan')
        ->where('kd_jabatan', $request->kd_jabatan)
        ->limit(1)
        ->update([
            'jabatan' => $request->jabatan,
            'kd_departemen' => $request->kd_departemen,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('jabatan.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_jabatan)
    {
        //get delete by ID
        DB::table('master_jabatan')
        ->where('kd_jabatan', $kd_jabatan)
        ->delete();

        //render view with post
         return redirect()->route('jabatan.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
