<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\hubungankeluarga;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class hubungankeluargaController extends Controller
{

    public function index()
    {
        //get posts
        $hubungankeluarga = DB::table('master_hub_keluarga')
        ->orderBy('kd_hub_keluarga', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_hub_keluarga.index', compact('hubungankeluarga'));
    }

    public function create()
    {
        return view('admin_pages.master_hub_keluarga.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_hub_keluarga')->insert([
                'hub_keluarga' => $request->hub_keluarga,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('hub_keluarga.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_hub_keluarga)
    {
        //get post by ID
        $hubungankeluarga = DB::table('master_hub_keluarga')
        ->where('kd_hub_keluarga', $kd_hub_keluarga)
        ->first();

        //render view with post
        return view('admin_pages.master_hub_keluarga.edit', compact('hubungankeluarga'));
    }

    public function update(Request $request)
    {
        DB::table('master_hub_keluarga')
        ->where('kd_hub_keluarga', $request->kd_hub_keluarga)
        ->limit(1)
        ->update([
            'hub_keluarga' => $request->hub_keluarga,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('hub_keluarga.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_hub_keluarga)
    {
        //get delete by ID
        DB::table('master_hub_keluarga')
        ->where('kd_hub_keluarga', $kd_hub_keluarga)
        ->delete();

        //render view with post
         return redirect()->route('hub_keluarga.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
