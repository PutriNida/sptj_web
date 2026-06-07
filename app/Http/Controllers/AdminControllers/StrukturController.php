<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class StrukturController extends Controller
{

    public function index()
    {
        $struktur = DB::table('struktur')
            ->orderBy('no_struktur', 'asc')
            ->get();

        return view('admin_pages.admin_struktur.index', compact('struktur'));
    }

    public function upload()
    {
        return view('admin_pages.admin_struktur.upload');
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
                                DB::table('struktur')->insert([
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
                                DB::table('struktur')->insert([
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
        return redirect()->route('admin_struktur.index')
        ->with([ 'success' => 'Berhasil Upload '.$jumberhasil.', Gagal Upload '.$jumgagal.'!' ]);
    }

    public function destroy($no_struktur)
    {
        //get delete by ID
        DB::table('struktur')
        ->where('no_struktur', $no_struktur)
        ->delete();

        //render view with post
         return redirect()->route('admin_struktur.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function publish($no_struktur)
    {
        DB::table('struktur')
        ->where('no_struktur', $no_struktur)
        ->limit(1)
        ->update([
            'publish_at' => Carbon::now()->format('Y-m-d')
        ]);

        //render view with post
         return redirect()->route('admin_struktur.index')
        ->with(['success' => 'Data Berhasil Dipublikasikan!']);
    }

    public function increaseViews($no_struktur)
    {
        $struktur = DB::table('struktur')
        ->where('no_struktur', $no_struktur)
        ->first();

        DB::table('struktur')
                    ->where('no_struktur', $no_struktur)
                    ->limit(1)
                    ->update([
                        'views' => $struktur->views + 1
                    ]);
    }
}


?>
