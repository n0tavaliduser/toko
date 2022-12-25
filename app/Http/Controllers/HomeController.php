<?php

namespace App\Http\Controllers;
// Models
use App\Models\User;
use App\Models\Diskon;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = DB::table('users')->get()->first();
        return view('frontends.home', [
            'user' => $user
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function frontend_index()
    {
        $diskon = DB::table('diskons')->where('aktif', 1)->get()->first();
        // dd($diskon);
        return view('frontends.index', [
            'diskon' => $diskon
        ]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function frontend_register()
    {
        return view('frontends.register');
    }
}
