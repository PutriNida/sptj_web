<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\WebsiteModels\Member;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MemberController extends Controller
{

    public function index()
    {
            $member = DB::table('anggota')
            ->join('master_lokasi_kerja', 'master_lokasi_kerja.kd_lokasi_kerja', '=', 'anggota.kd_lokasi_kerja')
            ->join('master_jabatan', 'master_jabatan.kd_jabatan', '=', 'anggota.kd_jabatan')
            ->get();
        
        return view('admin_pages.member.index', compact('member'));
    }
}


?>
