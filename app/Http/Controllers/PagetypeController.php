<?php

namespace App\Http\Controllers;
use App\Models\Pagetype;
use App\Models\Menu;
use Illuminate\Http\Request;

class PagetypeController extends Controller
{
    public function admin_page_type(Request $reqeust)
    {
        $pagetype = Pagetype::withCount('menu')->paginate(10);
        return view('pages.pagetype',compact('pagetype'));
    }

    public function admin_page_type_menu(Request $reqeust)
    {
        return view('pages.pagetype_menu');
    }

    public function store_menu_type(Request $request)
    {
        $jenis_menu = $request->jenis_menu;
        $pagetype = Pagetype::find($request->pagetype_id);
        if ($request->jenis_menu == 'mainmenu') {
            # code...
            $menu = Menu::find($request->mainmenu_id);
            $menu->pagetype()->syncWithoutDetaching($request->pagetype_id);
            return response()->json([
                'status'=>200,
                'message'=>'Menu '.$menu->mainmenu_name.' telah di set page typenya menjadi type '
                .$pagetype->type_name
            ]);
        }else {
            # code...
            // pending pengerjaan    
        }
    }
}
