<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\StatusKaryawan;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class StatusKaryawanController extends Controller
{

    public function index()
    {
        //get posts
        $status_karyawan = DB::table('master_status_karyawan')
        ->orderBy('kd_status_karyawan', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_status_karyawan.index', compact('status_karyawan'));
    }

    public function create()
    {
        return view('pages.master_status_karyawan.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_status_karyawan')->insert([
                'status_karyawan' => $request->status_karyawan,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('status_karyawan.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_status_karyawan)
    {
        //get post by ID
        $status_karyawan = DB::table('master_status_karyawan')
        ->where('kd_status_karyawan', $kd_status_karyawan)
        ->first();

        //render view with post
        return view('pages.master_status_karyawan.edit', compact('status_karyawan'));
    }

    public function update(Request $request)
    {
        DB::table('master_status_karyawan')
        ->where('kd_status_karyawan', $request->kd_status_karyawan)
        ->limit(1)
        ->update([
            'status_karyawan' => $request->status_karyawan,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('status_karyawan.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_status_karyawan)
    {
        //get delete by ID
        DB::table('master_status_karyawan')
        ->where('kd_status_karyawan', $kd_status_karyawan)
        ->delete();

        //render view with post
         return redirect()->route('status_karyawan.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
