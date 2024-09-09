<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\kartuidentitas;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class KartuIdentitasController extends Controller
{

    public function index()
    {
        //get posts
        $kartuidentitas = DB::table('master_kartu_identitas')
        ->orderBy('kd_kartu_identitas', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_kartu_identitas.index', compact('kartuidentitas'));
    }

    public function create()
    {
        return view('admin_pages.master_kartu_identitas.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_kartu_identitas')->insert([
                'kartu_identitas' => $request->kartu_identitas,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('kartu_identitas.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_kartu_identitas)
    {
        //get post by ID
        $kartuidentitas = DB::table('master_kartu_identitas')
        ->where('kd_kartu_identitas', $kd_kartu_identitas)
        ->first();

        //render view with post
        return view('admin_pages.master_kartu_identitas.edit', compact('kartuidentitas'));
    }

    public function update(Request $request)
    {
        DB::table('master_kartu_identitas')
        ->where('kd_kartu_identitas', $request->kd_kartu_identitas)
        ->limit(1)
        ->update([
            'kartu_identitas' => $request->kartu_identitas,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('kartu_identitas.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_kartu_identitas)
    {
        //get delete by ID
        DB::table('master_kartu_identitas')
        ->where('kd_kartu_identitas', $kd_kartu_identitas)
        ->delete();

        //render view with post
         return redirect()->route('kartu_identitas.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
