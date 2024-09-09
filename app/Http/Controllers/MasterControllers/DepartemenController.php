<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\Departemen;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class DepartemenController extends Controller
{

    public function index()
    {
        //get posts
        $departemen = DB::table('master_departemen')
        ->join('master_divisi', 'master_divisi.kd_divisi', '=', 'master_departemen.kd_divisi')
        ->orderBy('kd_departemen', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_departemen.index', compact('departemen'));
    }

    public function create()
    {
        $divisi = DB::table('master_divisi')
         ->orderBy('kd_divisi', 'asc')
        ->get();

        return view('admin_pages.master_departemen.create', compact('divisi'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_departemen')->insert([
                'departemen' => $request->departemen,
                'kd_divisi' => $request->kd_divisi,
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
        $divisi = DB::table('master_divisi')
         ->orderBy('kd_divisi', 'asc')
        ->get();
        $departemen = DB::table('master_departemen')
        ->join('master_divisi', 'master_divisi.kd_divisi', '=', 'master_departemen.kd_divisi')
        ->where('kd_departemen', $kd_departemen)
        ->first();

        //render view with post
        return view('admin_pages.master_departemen.edit', compact('divisi','departemen'));
    }

    public function update(Request $request)
    {
        DB::table('master_departemen')
        ->where('kd_departemen', $request->kd_departemen)
        ->limit(1)
        ->update([
            'departemen' => $request->departemen,
            'kd_divisi' => $request->kd_divisi,
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
