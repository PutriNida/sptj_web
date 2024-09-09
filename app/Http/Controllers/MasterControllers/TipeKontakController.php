<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;

use App\Models\MasterModels\TipeKontak;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class TipeKontakController extends Controller
{

    public function index()
    {
        //get posts
        $tipe_kontak = DB::table('master_tipe_kontak')
        ->orderBy('kd_tipe_kontak', 'asc')
        ->get();

        //render view with posts
        return view('admin_pages.master_tipe_kontak.index', compact('tipe_kontak'));
    }

    public function create()
    {
        return view('admin_pages.master_tipe_kontak.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_tipe_kontak')->insert([
                'tipe_kontak' => $request->tipe_kontak,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }


        //redirect to index
        return redirect()->route('tipe_kontak.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_tipe_kontak)
    {
        //get post by ID
        $tipe_kontak = DB::table('master_tipe_kontak')
        ->where('kd_tipe_kontak', $kd_tipe_kontak)
        ->first();

        //render view with post
        return view('admin_pages.master_tipe_kontak.edit', compact('tipe_kontak'));
    }

    public function update(Request $request)
    {
        DB::table('master_tipe_kontak')
        ->where('kd_tipe_kontak', $request->kd_tipe_kontak)
        ->limit(1)
        ->update([
            'tipe_kontak' => $request->tipe_kontak,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('tipe_kontak.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_tipe_kontak)
    {
        //get delete by ID
        DB::table('master_tipe_kontak')
        ->where('kd_tipe_kontak', $kd_tipe_kontak)
        ->delete();

        //render view with post
         return redirect()->route('tipe_kontak.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
