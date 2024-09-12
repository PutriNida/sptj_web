<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\TentangKami;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TentangKamiController extends Controller
{

    public function index()
    {
        $tentangkami =  DB::table('tentang_kami')
            ->orderBy('no', 'asc')
            ->get();
                
        return view('admin_pages.admin_tentang_kami.index', compact('tentangkami'));
    }

    public function create()
    {
        return view('admin_pages.admin_tentang_kami.create');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'judul' => 'required|string|max:250',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $base64Image = null;
        }
switch ($request->save) {
            case 'publish':
        try{
                    DB::table('tentang_kami')->insert([
                        'judul' => $request->judul,
                        'detail' => $request->detail,
                        'gambar' => $base64Image,
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
                    DB::table('tentang_kami')->insert([
                        'judul' => $request->judul,
                        'detail' => $request->detail,
                        'gambar' => $base64Image,
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

        return redirect()->route('admin_tentang_kami.index')
        ->with([ $status => $message]);
    }

    public function edit($no)
    {
        $tentangkami = DB::table('tentang_kami')
        ->where('no', $no)
        ->first();

        //render view with post
        return view('admin_pages.admin_tentang_kami.edit', compact('tentangkami'));
    }

    public function update(Request $request)
    {
        $status = '';
        $message = '';

        $request->validate([
            'judul' => 'required|string|max:250',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $base64Image = $request->gambarLatest;
        }
switch ($request->save) {
            case 'publish':
                try{
                    DB::table('tentang_kami')
                    ->where('no', $request->no)
                    ->limit(1)
                    ->update([
                        'judul' => $request->judul,
                        'gambar' => $base64Image,
                        'detail' => $request->detail,
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
                    DB::table('tentang_kami')
                    ->where('no', $request->no)
                    ->limit(1)
                    ->update([
                        'judul' => $request->judul,
                        'gambar' => $base64Image,
                        'detail' => $request->detail,
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

        return redirect()->route('admin_tentang_kami.index')
        ->with([$status => $message]);
    }

    public function destroy($no)
    {
        //get delete by ID
        DB::table('tentang_kami')
        ->where('no', $no)
        ->delete();

        //render view with post
         return redirect()->route('admin_tentang_kami.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}


?>
