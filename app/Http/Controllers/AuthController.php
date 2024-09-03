<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Login;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

use Session;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home.index');
        }else{
            return view('pages.auth.login');
        }
    }

    public function loginaction(Request $request)
    {

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('home.index')->with(['success' => 'Berhasil Masuk!']);
        }else{
            Session::flash('error', 'Ueername atau Password Tidak Ditemukan');
            return redirect('/');
        }       
    }
}


?>
