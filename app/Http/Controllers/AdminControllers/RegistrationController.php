<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RegistrationController extends Controller
{

    public function index()
    {     
        return view('admin_pages.auth.registration');
    }

    public function store(Request $request)
    {
        $status = '';
        $message = '';

        $pass = $request->password;
        $repass = $request->repassword;
        if($pass == $repass){
            
        }
        try{
            $member = \App\Models\Member::where('no_karyawan', '=', $request->no_karyawan)
            ->where('nik_sptj', '=', $request->nik_sptj)
            ->first();

            if($member){
                DB::table('user_login')
                ->insert([
                    'username' => $request->username,
                    'password' => $request->password,
                    'no_karyawan' => $member['no_karyawan']
                ]);
                 $status = 'success';
                $message = 'Akun Berhasil Dibuat. Silahkan Login!';
            }else{
                $status = 'error';
                $message = 'Akun Gagal Dibuat. Nomor Induk Karyawan dan NIK SPTJ belum terdaftar!';
            }        
          
        }catch(Exception $error){
            $status = 'error';
            $message = $error;
        }

        //redirect to index
        return redirect()->route('auth.login')
        ->with([ $status => $message]);
    }

}


?>
