<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Pagetype;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function admin_menu_control(Request $request)
    {
        $mainmenu = Menu::with('pagetype')->paginate(10);
        $pagetype = Pagetype::get();
        return view('pages.mainmenu',compact('mainmenu','pagetype'));
    }

    public function admin_submenu_control(Request $request)
    {
       
    }

    public function store_main_menu(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $validator = Validator::make($request->all(), [
                'menu_name'      => 'required|',
                'menu_stat'      => 'required|',
                'pagetype_id'    => 'required|'
            ]);

            if ($validator->fails()) {
                # code...
                return response()->json([
                    'status'=>400,
                    'message'=>$validator->messages()
                ]);
            }else {
                # code...
                Menu::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'menu_name'=> $request->menu_name,
                        'menu_link'=> str::slug($request->menu_name),
                        'menu_stat'=> $request->menu_stat,
                        'menu_type'=> 'mainmenu',
                        'pagetype_id' => $request->pagetype_id
                    ]
                );

                return response()->json([
                    'status'=>200,
                    'message'=>'New Menu has been successfully created!',
                    'link'=>'admin-menu-control'
                ]);
            }
        }
    }

    public function remove_main_menu(Request $request)
    {
        if ($request->ajax()) {
            # code...
            $main = Menu::where('id', $request->id)->first();
            $main->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Menu tersebut telah dihapus dari sistem',
                'link'=>'admin-menu-control'
            ]);
        }
    }

    public function cek_status_menu(Request $request, $mainmenu_id)
    {
        if ($request->ajax()) {
            # code...
            $mainmenu = Menu::findOrFail($mainmenu_id);
            return response()->json([
                'status'=>200,
                'mainmenu_stat'=> $mainmenu->mainmenu_stat,
                'message'=> 'display status main menu'
            ]);
        }
    }
}
