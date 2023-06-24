<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Pagetype;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin_dashboard(Request $request)
    {
        $mainmenu = Menu::paginate(10);
        $pagetype = Pagetype::get();

        return view('pages.dashboard',compact('mainmenu','pagetype'));
    }
}
