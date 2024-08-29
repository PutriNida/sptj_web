<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MediaSosialController extends Controller
{
    public function index()
    {
        // Get posts
        $mediasosial = DB::table('master_media_sosial')
            ->orderBy('kd_media_sosial', 'asc')
            ->get();

        // Render view with posts
        return view('pages.master_media_sosial.index', compact('mediasosial'));
    }

    public function create()
    {
        return view('pages.master_media_sosial.create');
    }

    public function store(Request $request)
    {
        // Validasi request
        $request->validate([
            'media_sosial' => 'required|string|max:255',
            'ikon_media_sosial' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_enabled' => 'nullable|boolean',
        ]);

        // Mengonversi file ikon ke format Base64
        if ($request->hasFile('ikon_media_sosial')) {
            $file = $request->file('ikon_media_sosial');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            $base64Image = null;
        }

        // Simpan data ke database
        DB::table('master_media_sosial')->insert([
            'media_sosial' => $request->media_sosial,
            'ikon_media_sosial' => $base64Image,
            'status_enabled' => $request->status_enabled ? 1 : 0,
        ]);

        // Redirect dengan pesan
        return redirect()->route('media_sosial.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($kd_media_sosial)
    {
        // Get post by ID
        $mediasosial = DB::table('master_media_sosial')
            ->where('kd_media_sosial', $kd_media_sosial)
            ->first();

        // Render view with post
        return view('pages.master_media_sosial.edit', compact('mediasosial'));
    }

    public function update(Request $request)
    {
        // Validasi request
        $request->validate([
            'media_sosial' => 'required|string|max:255',
            'ikon_media_sosial' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_enabled' => 'nullable|boolean',
        ]);

        // Mengonversi file ikon ke format Base64 jika ada file yang diunggah
        if ($request->hasFile('ikon_media_sosial')) {
            $file = $request->file('ikon_media_sosial');
            $imageData = file_get_contents($file->getRealPath());
            $base64Image = base64_encode($imageData);
            $mimeType = $file->getClientMimeType();
            $base64Image = 'data:' . $mimeType . ';base64,' . $base64Image;
        } else {
            // Ambil nilai lama jika tidak ada file baru
            $existing = DB::table('master_media_sosial')
                ->where('kd_media_sosial', $request->kd_media_sosial)
                ->first();
            $base64Image = $existing->ikon_media_sosial ?? null;
        }

        // Update data di database
        DB::table('master_media_sosial')
            ->where('kd_media_sosial', $request->kd_media_sosial)
            ->update([
                'media_sosial' => $request->media_sosial,
                'ikon_media_sosial' => $base64Image,
                'status_enabled' => $request->status_enabled ? 1 : 0,
            ]);

        // Redirect dengan pesan
        return redirect()->route('media_sosial.index')
            ->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function destroy($kd_media_sosial)
    {
        // Hapus data berdasarkan ID
        DB::table('master_media_sosial')
            ->where('kd_media_sosial', $kd_media_sosial)
            ->delete();

        // Redirect dengan pesan
        return redirect()->route('media_sosial.index')
            ->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
?>
