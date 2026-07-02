<?php

namespace App\Http\Controllers\MasterControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisDokumenController extends Controller
{
    public function index()
    {
        $items = DB::table('master_jenis_dokumen')->orderBy('id', 'asc')->get();
        return view('admin_pages.master_jenis_dokumen.index', compact('items'));
    }

    public function create()
    {
        return view('admin_pages.master_jenis_dokumen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_dokumen' => 'required|string|max:255|unique:master_jenis_dokumen,nama_jenis_dokumen',
        ]);

        DB::table('master_jenis_dokumen')->insert([
            'nama_jenis_dokumen' => $request->nama_jenis_dokumen,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = DB::table('master_jenis_dokumen')->where('id', $id)->first();
        if (!$item) return redirect()->route('jenis_dokumen.index');
        return view('admin_pages.master_jenis_dokumen.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
            'nama_jenis_dokumen' => 'required|string|max:255|unique:master_jenis_dokumen,nama_jenis_dokumen,' . $request->id . ',id',
        ]);

        DB::table('master_jenis_dokumen')->where('id', $request->id)->update([
            'nama_jenis_dokumen' => $request->nama_jenis_dokumen,
            'updated_at' => now(),
        ]);

        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil diperbarui');
    }

    public function destroy($id)
    {
        DB::table('master_jenis_dokumen')->where('id', $id)->delete();
        return redirect()->route('jenis_dokumen.index')->with('success', 'Jenis dokumen berhasil dihapus');
    }
}

