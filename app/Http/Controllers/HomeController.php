<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\View\View;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use Carbon\Carbon;

class HomeController extends Controller
{

    public function index()
    {
      
        return view('dashboard');
    }
}


?>
