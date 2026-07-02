<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class DokumenController extends Controller
{
    protected $table = 'dokumen';

    public function index()
    {
        $jenis = DB::table('master_jenis_dokumen')
            ->orderBy('id', 'asc')
            ->get();

        $dokumen = DB::table($this->table)
            ->join('master_jenis_dokumen', 'master_jenis_dokumen.id', '=', 'dokumen.kd_jenis_dokumen')
            ->select(
                'dokumen.*',
                'master_jenis_dokumen.nama_jenis_dokumen'
            )
            ->orderBy('dokumen.created_at', 'desc')
            ->get();

        return view('admin_pages.admin_dokumen.index', compact('dokumen', 'jenis'));
    }

    public function upload()
    {
        $jenis = DB::table('master_jenis_dokumen')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin_pages.admin_dokumen.upload', compact('jenis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kd_jenis_dokumen' => 'required|integer|exists:master_jenis_dokumen,id',
            'nama' => 'required|string|max:255',
            'file' => 'required|file|max:20480',
            'keterangan' => 'nullable|string',
        ]);

        $file = $request->file('file');
        $mimeType = $file->getClientMimeType();
        $size = $file->getSize();
        $content = file_get_contents($file->getRealPath());
        $base64 = base64_encode($content);

        $originalName = $file->getClientOriginalName();
        $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

        // simpan ekstensi & original name untuk nama file saat download
        $ekstensi = $extension;
        $originalFilename = $originalName;


        // (Opsional) simpan data url untuk debug, tapi tetap simpan base64 murni

        $payload = [
            'kd_jenis_dokumen' => $request->kd_jenis_dokumen,
            'nama' => $request->nama,
            'file_base64' => $base64,
            'mime_type' => $mimeType,
            'ukuran' => $size,

            'ekstensi' => $ekstensi,
            'original_filename' => $originalFilename,

            'keterangan' => $request->keterangan,
            'publish' => $request->save === 'publish' ? 1 : 0,
            'publish_at' => $request->save === 'publish' ? Carbon::now() : null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];


        try {
            DB::table($this->table)->insert($payload);
            return redirect()
                ->route('admin_dokumen.index')
                ->with('success', 'Dokumen berhasil diupload');
        } catch (Exception $e) {
            // return redirect()
            //     ->route('admin_dokumen.index')
            //     ->with('error', 'Dokumen gagal diupload');
            return response()->json([
                'status' => 'error',
                'message' => 'Dokumen gagal diupload',
                'error' => $e->getMessage(),
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function edit($id)
    {
        $dokumen = DB::table($this->table)
            ->where('id', $id)
            ->first();

        if (!$dokumen) {
            return redirect()->route('admin_dokumen.index')
                ->with('error', 'Dokumen tidak ditemukan');
        }

        $jenis = DB::table('master_jenis_dokumen')
            ->orderBy('id', 'asc')
            ->get();

        return view('admin_pages.admin_dokumen.edit', compact('dokumen', 'jenis'));
    }
    public function destroy($id)
    {
        DB::table($this->table)->where('id', $id)->delete();

        return redirect()->route('admin_dokumen.index')
            ->with('success', 'Data dokumen berhasil dihapus');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:dokumen,id',
            'kd_jenis_dokumen' => 'required|integer|exists:master_jenis_dokumen,id',
            'nama' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'publish' => 'required|boolean',
        ]);

        $updateData = [
            'kd_jenis_dokumen' => $request->kd_jenis_dokumen,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'publish' => $request->publish,
            'updated_at' => Carbon::now(),
        ];

        // jika file baru diupload, update file + meta (ekstensi & original filename)
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $mimeType = $file->getClientMimeType();
            $size = $file->getSize();
            $content = file_get_contents($file->getRealPath());
            $base64 = base64_encode($content);

            $originalName = $file->getClientOriginalName();
            $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

            $updateData['file_base64'] = $base64;
            $updateData['mime_type'] = $mimeType;
            $updateData['ukuran'] = $size;
            $updateData['ekstensi'] = $extension;
            $updateData['original_filename'] = $originalName;
        }


        if ($request->publish) {
            $updateData['publish_at'] = Carbon::now();
        } else {
            $updateData['publish_at'] = null;
        }

        DB::table($this->table)->where('id', $request->id)->update($updateData);

        return redirect()->route('admin_dokumen.index')
            ->with('success', 'Dokumen berhasil diperbarui');
    }

    public function publish($id)
    {
        DB::table($this->table)
            ->where('id', $id)
            ->limit(1)
            ->update([
                'publish' => 1,
                'publish_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

        return redirect()->route('admin_dokumen.index')
            ->with('success', 'Dokumen berhasil dipublikasikan');
    }

    public function download($id)
    {
        $record = DB::table($this->table)
            ->where('id', $id)
            ->first();

        if (!$record) {
            return response()->json(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        $binary = base64_decode($record->file_base64);

        $filenameBase = preg_replace('/[^a-zA-Z0-9\-_\.]/', '_', $record->nama);

        $ekstensi = $record->ekstensi ?: '';
        $original = $record->original_filename ?: null;

        // kalau ada original filename, pakai ekstensi dari situ (lebih akurat)
        if ($original) {
            $originalExt = strtolower(pathinfo($original, PATHINFO_EXTENSION));
            if ($originalExt) {
                $ekstensi = $originalExt;
            }
        }

        $filename = $filenameBase . ($ekstensi ? '.' . ltrim($ekstensi, '.') : '');


        $mime = $record->mime_type ?: 'application/octet-stream';

        return response($binary, 200)
            ->header('Content-Type', $mime)
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"')
            ->header('Content-Length', strlen($binary));

    }
}

