<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Pagetype;
use App\Models\Guru;
use App\Models\News;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        $mainmenu = Menu::paginate(10);
        $pagetype = Pagetype::get();

        $jurusan  = Jurusan::count();
        $berita   = News::count();
        $guru     = Guru::count();
        return view('pages.dashboard',compact('mainmenu','pagetype','jurusan','berita','guru'));
    }
}
