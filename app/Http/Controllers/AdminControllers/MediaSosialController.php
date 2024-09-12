<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\MediaSosial;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MediaSosialController extends Controller
{

    public function index()
    {
        $mediasosial = DB::table('master_media_sosial')
         ->orderBy('kd_media_sosial', 'asc')
        ->get();

        $media_sosial =  DB::table('media_sosial')
            ->join('master_media_sosial', 'master_media_sosial.kd_media_sosial', '=', 'media_sosial.kd_media_sosial')
            ->orderBy('no_media_sosial', 'desc')
            ->get();
                
        return view('admin_pages.admin_media_sosial.index', compact('mediasosial', 'media_sosial'));
    }

    public function create()
    {
        $mediasosial = DB::table('master_media_sosial')
        ->orderBy('kd_media_sosial', 'asc')
        ->get();

        return view('admin_pages.admin_media_sosial.create', compact('mediasosial'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        switch ($request->save) {
            case 'publish':
                try{
                    DB::table('media_sosial')->insert([
                        'kd_media_sosial' => $request->kd_media_sosial,
                        'username_media_sosial' => $request->username_media_sosial,
                        'url' => $request->url,
                        'publish' => '1'
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
            
            case 'draft':
                try{
                    DB::table('media_sosial')->insert([
                        'kd_media_sosial' => $request->kd_media_sosial,
                        'username_media_sosial' => $request->username_media_sosial,
                        'url' => $request->url,
                        'publish' => '0'
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
        }

        return redirect()->route('admin_media_sosial.index')
        ->with([ $status => $message]);
    }

    public function edit($no_media_sosial)
    {
        $mediasosial = DB::table('master_media_sosial')
        ->orderBy('kd_media_sosial', 'asc')
        ->get();

        $media_sosial = DB::table('media_sosial')
        ->join('master_media_sosial', 'master_media_sosial.kd_media_sosial', '=', 'media_sosial.kd_media_sosial')
        ->where('no_media_sosial', $no_media_sosial)
        ->first();

        //render view with post
        return view('admin_pages.admin_media_sosial.edit', compact('mediasosial', 'media_sosial'));
    }

    public function update(Request $request)
    {
        $status = '';
        $message = '';

        switch ($request->save) {
            case 'publish':
                try{
                    DB::table('media_sosial')
                    ->where('no_media_sosial', $request->no_media_sosial)
                    ->limit(1)
                    ->update([
                        'kd_media_sosial' => $request->kd_media_sosial,
                        'username_media_sosial' => $request->username_media_sosial,
                        'url' => $request->url,
                        'publish' => '1'
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
            
            case 'draft':
                try{
                    DB::table('media_sosial')
                    ->where('no_media_sosial', $request->no_media_sosial)
                    ->limit(1)
                    ->update([
                        'kd_media_sosial' => $request->kd_media_sosial,
                        'username_media_sosial' => $request->username_media_sosial,
                        'url' => $request->url,
                        'publish' => '0'
                    ]);
                    $status = 'success';
                    $message = 'Data Berhasil Disimpan!';
                }catch(Exception $error){
                    $status = 'error';
                    $message = 'Data Gagal Disimpan!';
                }
                break;
        }

        return redirect()->route('admin_media_sosial.index')
        ->with([$status => $message]);
    }

    public function destroy($no_media_sosial)
    {
        //get delete by ID
        DB::table('media_sosial')
        ->where('no_media_sosial', $no_media_sosial)
        ->delete();

        //render view with post
         return redirect()->route('admin_media_sosial.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
