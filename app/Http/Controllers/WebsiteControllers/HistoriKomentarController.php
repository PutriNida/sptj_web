<?php

namespace App\Http\Controllers\WebsiteControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HistoriKomentarController extends Controller
{

    public function saveKomentarBerita(Request $request){
        $status = '';
        $message = '';

        try{
            DB::table('histori_komentar_berita')->insert([
                'no_berita' => $request->no_berita,
                'nama' => $request->nama,
                'isAnonymous' => isset($request->isAnonymous) ? 1 : 0,
                'komentar' => $request->komen,
                'create_at' => Carbon::now()->format('Y-m-d'),
                'reply_to' => $request->reply_to
            ]);
            $status = 'success';
            $message = 'Data Berhasil Disimpan!';
        }catch(Exception $error){
            $status = 'error';
            $message = 'Data Gagal Disimpan!';
        }
    }

}


?>
