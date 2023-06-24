<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

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
        $session = Auth::user()->role;
        if ($session == 'admin' || $session == 'super_admin') {
            # code...
            return response()->json([
                'status'=>'200',
                'message'=>'Login success! Welcome back',
                'link'=>'/admin-dashboard'
            ]);
        }else {
            # code...
            // return view('home');
            return response()->json([
                'status'=>'400',
                'message'=>'Maaf hanya admin yang diperbolehkan masuk'
            ]);
        }
    }
}
