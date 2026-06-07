<?php
namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
// use App\Models\WebsiteModels\Berita;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Exception;
use Symfony\Component\HttpFoundation\Response;

class AspirasiController extends Controller
{
    protected $table = 'pengaduan_aspirasi';

    public function index()
    {
        $aspirasi = DB::table($this->table)
            // ->where('jenis', 'aspirasi')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin_pages.admin_aspirasi.index', compact('aspirasi'));
    }

    public function create()
    {
        return view('admin_pages.admin_aspirasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
        ]);

        $now = now();
        $payload = array_merge($data, [
            'jenis' => 'aspirasi',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table($this->table)->insert($payload);

        return redirect()->route('admin_aspirasi.index')->with('success', 'Aspirasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $record = DB::table($this->table)
            ->where('id', $id)
            ->where('jenis', 'aspirasi')
            ->first();

        if (! $record) {
            return response()->json(['message' => 'Not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($record);
    }

    public function edit($id)
    {
        $aspirasi = DB::table($this->table)
            ->where('id', $id)
            // ->where('jenis', 'aspirasi')
            ->first();

        if (!$aspirasi) {
            return redirect()->route('admin_aspirasi.index');
        }

        return view('admin_pages.admin_aspirasi.edit', compact('aspirasi'));
    }

    public function update(Request $request, $id)
    {
        $exists = DB::table($this->table)->where('id', $id)->exists();
        if (!$exists) {
            return redirect()->route('admin_aspirasi.index');
        }

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pesan' => 'required|string',
            'jenis' => 'required|string|in:pengaduan,aspirasi',
        ]);

        $data['updated_at'] = now();

        DB::table($this->table)->where('id', $id)->update($data);

        return redirect()->route('admin_aspirasi.index')->with('success', 'Aspirasi/pengaduan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $deleted = DB::table($this->table)->where('id', $id)->delete();

        // if (! $deleted) {
        //     return response()->json(['message' => 'Not found or not an aspirasi'], Response::HTTP_NOT_FOUND);
        // }

return redirect()
        ->route('admin_aspirasi.index') // balik ke halaman list
        ->with('success', 'Data berhasil dihapus');    }

    public function changeType(Request $request, $id)
    {
        $data = $request->validate([
            'jenis' => 'required|string|in:pengaduan,aspirasi',
        ]);

        $updated = DB::table($this->table)->where('id', $id)->update([
            'jenis' => $data['jenis'],
            'updated_at' => now(),
        ]);

        if (!$updated) {
            return redirect()->route('aspirasi.index')->with('error', 'Aspirasi tidak ditemukan');
        }

        return redirect()->route('aspirasi.index')->with('success', 'Jenis aspirasi berhasil diubah');
    }
}