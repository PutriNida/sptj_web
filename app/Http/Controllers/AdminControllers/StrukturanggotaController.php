<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;

class StrukturanggotaController extends Controller
{

    public function index()
    {
        $struktur = DB::table('struktur_anggota')
            ->join('anggota', 'anggota.no_karyawan', '=', 'struktur_anggota.no_karyawan')
            ->select('struktur_anggota.*', 'anggota.nama_lengkap')
            ->orderBy('no_struktur_anggota', 'asc')
            ->get();

        return view('admin_pages.admin_struktur_anggota.index', compact('struktur'));
    }

    public function upload()
    {
        // Ambil daftar anggota untuk dipilih
        $anggota = DB::table('anggota')
            ->orderBy('no_karyawan', 'asc')
            ->get(['no_karyawan', 'nama_lengkap']);

        return view('admin_pages.admin_struktur_anggota.upload', compact('anggota'));
    }


    public function store(Request $request)
    {
        $status = '';
        $message = '';
        $jumberhasil = 0;
        $jumgagal = 0;

        $data = $request->validate([
            'no_karyawan' => 'required|string|max:255|exists:anggota,no_karyawan',
            'keterangan' => 'nullable|string',
            'gambar.*' => 'required|file|max:10240'
        ]);

        $selectedNoKaryawan = $data['no_karyawan'];

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
                                DB::table('struktur_anggota')->insert([
                                    'gambar' => $base64Image,
                                    'keterangan' => $request->keterangan,
                                    'no_karyawan' => $selectedNoKaryawan,
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
                                DB::table('struktur_anggota')->insert([
                                    'gambar' => $base64Image,
                                    'keterangan' => $request->keterangan,
                                    'no_karyawan' => $selectedNoKaryawan,
                                    'create_at' => Carbon::now()->format('Y-m-d'),
                                    'publish_at' => Carbon::now()->format('Y-m-d'),
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
        return redirect()->route('admin_struktur_anggota.index')
        ->with([ 'success' => 'Berhasil Upload '.$jumberhasil.', Gagal Upload '.$jumgagal.'!' ]);
    }

    public function destroy($no_struktur)
    {
        //get delete by ID
        DB::table('struktur_anggota')
        ->where('no_struktur_anggota', $no_struktur)
        ->delete();

        //render view with post
         return redirect()->route('admin_struktur_anggota.index')
        ->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function publish($no_struktur)
    {
        DB::table('struktur_anggota')
        ->where('no_struktur_anggota', $no_struktur)
        ->limit(1)
        ->update([
            'publish_at' => Carbon::now()->format('Y-m-d')
        ]);

        //render view with post
         return redirect()->route('admin_struktur_anggota.index')
        ->with(['success' => 'Data Berhasil Dipublikasikan!']);
    }

    public function increaseViews($no_struktur)
    {
        $struktur = DB::table('struktur_anggota')
        ->where('no_struktur_anggota', $no_struktur)
        ->first();

        DB::table('struktur_anggota')
                    ->where('no_struktur_anggota', $no_struktur)
                    ->limit(1)
                    ->update([
                        'views' => $struktur->views + 1
                    ]);
    }
}


?>
