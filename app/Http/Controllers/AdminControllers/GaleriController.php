<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\Galeri;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GaleriController extends Controller
{

    public function index()
    {
        $kategorigaleri = DB::table('master_kategori_galeri')
         ->orderBy('kd_kategori_galeri', 'asc')
        ->get();

        $kategorigaleri = DB::table('galeri')
            ->join('master_kategori_galeri', 'master_kategori_galeri.kd_kategori_galeri', '=', 'galeri.kd_kategori_galeri')
            ->select(DB::raw('count(*) as num'), 'master_kategori_galeri.kategori_galeri as kategori_galeri', 'master_kategori_galeri.kd_kategori_galeri as kd_kategori_galeri')
            ->groupBy('master_kategori_galeri.kategori_galeri', 'master_kategori_galeri.kd_kategori_galeri')
            ->get();
              
        return view('admin_pages.admin_galeri.index', compact('kategorigaleri'));
    }

    public function detail($kd_kategori_galeri)
    {
        $galeri = DB::table('galeri')
            ->join('master_kategori_galeri', 'master_kategori_galeri.kd_kategori_galeri', '=', 'galeri.kd_kategori_galeri')
            ->join('anggota', 'anggota.no_karyawan', '=', 'galeri.no_karyawan')
            ->where('galeri.kd_kategori_galeri', $kd_kategori_galeri)
            ->get();
              
        return view('admin_pages.admin_galeri.detail', compact('galeri'));
    }

    public function upload()
    {
        $kategorigaleri = DB::table('master_kategori_galeri')
        ->orderBy('kd_kategori_galeri', 'asc')
        ->get();

        return view('admin_pages.admin_galeri.upload', compact('kategorigaleri'));
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';
        $jumberhasil = 0;
        $jumgagal = 0;

        if($request->hasFile('gambar')) {
            $files = $request->file('gambar');

            foreach ($files as $key => $file) {
                if($file->isValid()) {
                    $imageData = file_get_contents($file->getRealPath());
                    $base64Image = base64_encode($imageData);
                    $mimeType = $file->getClientMimeType();
                    $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
                    switch ($request->save) {
                        case 'publish':
                            try{                
                                DB::table('galeri')->insert([
                                    'kd_kategori_galeri' => $request->kd_kategori_galeri,
                                    'gambar' => $base64Image,
                                    'keterangan' => $request->keterangan,
                                    'no_karyawan' => session('no_karyawan'),
                                    'create_at' => Carbon::now()->format('Y-m-d'),
                                    'publish_at' => Carbon::now()->format('Y-m-d'),
                                    'views' => 0
                                ]);
                                $jumberhasil = $jumberhasil+1;
                            }catch(Exception $error){
                                $jumgagal = $jumgagal+1;
                            }
                        break;
            
                        case 'draft':
                            try{                
                                DB::table('galeri')->insert([
                                    'kd_kategori_galeri' => $request->kd_kategori_galeri,
                                    'gambar' => $base64Image,
                                    'keterangan' => $request->keterangan,
                                    'no_karyawan' => session('no_karyawan'),
                                    'create_at' => Carbon::now()->format('Y-m-d'),
                                    'views' => 0
                                ]);                                
                                $jumberhasil = $jumberhasil+1;
                            }catch(Exception $error){
                                $jumgagal = $jumgagal+1;
                            }
                        break;
                    }
                }
            }
        }
        return redirect()->route('admin_galeri.index')
        ->with([ 'success' => 'Berhasil Upload '.$jumberhasil.', Gagal Upload '.$jumgagal.'!' ]);
    }

    public function destroy($no_galeri)
    {
        //get delete by ID
        DB::table('galeri')
        ->where('no_galeri', $no_galeri)
        ->delete();

        //render view with post
         return redirect()->route('admin_galeri.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function publish($no_galeri)
    {
        DB::table('galeri')
        ->where('no_galeri', $no_galeri)
        ->limit(1)
        ->update([
            'publish_at' => Carbon::now()->format('Y-m-d')
        ]);

        //render view with post
         return redirect()->route('admin_galeri.index')
        ->with(['success' => 'Data Berhasil Dipublikasikan!']);
    }

    public function increaseViews($no_galeri)
    {
        $galeri = DB::table('galeri')
        ->where('no_galeri', $no_galeri)
        ->first();

        DB::table('galeri')
                    ->where('no_galeri', $request->no_galeri)
                    ->limit(1)
                    ->update([
                        'views' => $galeri->views + 1
                    ]);
    }
}


?>
