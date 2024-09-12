<?php

namespace App\Http\Controllers\AdminControllers;
use App\Http\Controllers\Controller;
use App\Models\Login;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/home');
        }else{
            return view('admin_pages.auth.login');
        }
    }

    public function loginaction(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // Get the user from the database
        $user = \App\Models\User::where('username', $credentials['username'])->first();

        if ($user && $user->password === $credentials['password']) {
            // If user exists and passwords match, authenticate
            Auth::login($user);

            // $member = \App\Models\Member::where('no_karyawan', $user['no_karyawan'])->first();
            $member = DB::table('anggota')
            ->join('master_jabatan', 'master_jabatan.kd_jabatan', '=', 'anggota.kd_jabatan')
            ->where('anggota.no_karyawan', $user['no_karyawan'])
            ->first();
            session(['nama_lengkap' => $member->nama_lengkap]);
            session(['no_karyawan' => $member->no_karyawan]);
            session(['level' => $member->level]);

            error_log($member->level);

            return redirect()->intended('/home');
        }

        Session::flash('error', 'Username atau Password Tidak Ditemukan');

        // Authentication failed
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout(); // Log the user out

        // Optionally, you can invalidate the session
        request()->session()->invalidate();
        
        // Optionally, regenerate the session to prevent fixation
        request()->session()->regenerateToken();

        return redirect('/'); // Redirect to the homepage or login page
    }
}


?>
