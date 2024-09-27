<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\HubungiKami;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HubungiKamiController extends Controller
{

    public function index()
    {
        $tipe_kontak = DB::table('master_tipe_kontak')
         ->orderBy('kd_tipe_kontak', 'asc')
        ->get();

        $hubungi_kami =  DB::table('hubungi_kami')
            ->join('master_tipe_kontak', 'master_tipe_kontak.kd_tipe_kontak', '=', 'hubungi_kami.kd_tipe_kontak')
            ->orderBy('no', 'desc')
            ->get();
                
        return view('admin_pages.admin_hubungi_kami.index', compact('tipe_kontak', 'hubungi_kami'));
    }

    public function create()
    {
        $tipe_kontak = DB::table('master_tipe_kontak')
        ->orderBy('kd_tipe_kontak', 'asc')
        ->get();

        return view('admin_pages.admin_hubungi_kami.create', compact('tipe_kontak'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        switch ($request->save) {
            case 'publish':
                try{
                    DB::table('hubungi_kami')->insert([
                        'kd_tipe_kontak' => $request->kd_tipe_kontak,
                        'judul' => $request->judul,
                        'tujuan' => $request->tujuan,
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
                    DB::table('hubungi_kami')->insert([
                        'kd_tipe_kontak' => $request->kd_tipe_kontak,
                        'judul' => $request->judul,
                        'tujuan' => $request->tujuan,
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

        return redirect()->route('admin_hubungi_kami.index')
        ->with([ $status => $message]);
    }

    public function edit($no)
    {
        $tipe_kontak = DB::table('master_tipe_kontak')
        ->orderBy('kd_tipe_kontak', 'asc')
        ->get();

        $hubungi_kami = DB::table('hubungi_kami')
        ->join('master_tipe_kontak', 'master_tipe_kontak.kd_tipe_kontak', '=', 'hubungi_kami.kd_tipe_kontak')
        ->where('no', $no)
        ->first();

        //render view with post
        return view('admin_pages.admin_hubungi_kami.edit', compact('tipe_kontak', 'hubungi_kami'));
    }

    public function update(Request $request)
    {
        $status = '';
        $message = '';

        switch ($request->save) {
            case 'publish':
                try{
                    DB::table('hubungi_kami')
                    ->where('no', $request->no)
                    ->limit(1)
                    ->update([
                        'kd_tipe_kontak' => $request->kd_tipe_kontak,
                        'judul' => $request->judul,
                        'tujuan' => $request->tujuan,
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
                    DB::table('hubungi_kami')
                    ->where('no', $request->no)
                    ->limit(1)
                    ->update([
                        'kd_tipe_kontak' => $request->kd_tipe_kontak,
                        'judul' => $request->judul,
                        'tujuan' => $request->tujuan,
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

        return redirect()->route('admin_hubungi_kami.index')
        ->with([$status => $message]);
    }

    public function destroy($no)
    {
        //get delete by ID
        DB::table('hubungi_kami')
        ->where('no', $no)
        ->delete();

        //render view with post
         return redirect()->route('admin_hubungi_kami.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
