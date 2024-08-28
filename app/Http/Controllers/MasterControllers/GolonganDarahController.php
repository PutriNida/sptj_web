<?php

namespace App\Http\Controllers;

use App\Models\MasterModels\GolonganDarah;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class GolonganDarahController extends Controller
{

    public function index()
    {
        //get posts
        $goldarah = DB::table('master_gol_darah')
        ->orderBy('kd_gol_darah', 'asc')
        ->get();

        //render view with posts
        return view('pages.master_golongan_darah.index', compact('goldarah'));
    }

    public function create()
    {
        return view('pages.master_golongan_darah.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        try{
            DB::table('master_gol_darah')->insert([
                'gol_darah' => $request->gol_darah,
                'status_enabled' => isset($request->status_enabled) ? 1 : 0
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }
        

        //redirect to index
        return redirect()->route('gol_darah.index')
        ->with([ $status => $message]);
    }

    public function edit($kd_gol_darah)
    {
        //get post by ID
        $goldarah = DB::table('master_gol_darah')
        ->where('kd_gol_darah', $kd_gol_darah)
        ->first();

        //render view with post
        return view('pages.master_golongan_darah.edit', compact('goldarah'));
    }

    public function update(Request $request)
    {
        DB::table('master_gol_darah')
        ->where('kd_gol_darah', $request->kd_gol_darah)
        ->limit(1) 
        ->update([
            'gol_darah' => $request->gol_darah,
            'status_enabled' => isset($request->status_enabled) ? 1 : 0
        ]);

        //redirect to index
        return redirect()->route('gol_darah.index')
        ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_gol_darah)
    {
        //get delete by ID
        DB::table('master_gol_darah')
        ->where('kd_gol_darah', $kd_gol_darah)
        ->delete();

        //render view with post
         return redirect()->route('gol_darah.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>