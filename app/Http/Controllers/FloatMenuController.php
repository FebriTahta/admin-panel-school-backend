<?php

namespace App\Http\Controllers;
use App\Models\Sosmed;
use App\Models\Floatmenu;
use Validator;
use Illuminate\Http\Request;

class FloatMenuController extends Controller
{
    public function admin_floatmenu()
    {
        $sosmed = Sosmed::get();
        $data   = Floatmenu::paginate(10);
        return view('pages.float_list', compact('sosmed','data'));
    }

    public function new_floatmenu(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'floatmenus_link'  => 'required|max:100',
            'floatmenus_name'  => 'required|',
            'floatmenus_icon'  => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {

            $data = Floatmenu::updateOrCreate(
                [
                    'id'=> $request->id,
                ],
                [
                    'floatmenus_name'        => $request->floatmenus_name,
                    'floatmenus_link'        => $request->floatmenus_link,
                    'floatmenus_icon'        => $request->floatmenus_icon,
                ]
            );

            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function create_floatmenu()
    {
        $status = 'create';
        return view('pages.create_floatmenu',compact('status'));
    }

    public function remove_floatmenu(Request $request)
    {
        $data = Floatmenu::where('id', $request->id)
                ->delete();
        return response()->json(['status'=>200,'message'=>'Menu Telah Dihapus']);
    }

    public function edit_floatmenu($id)
    {
        $status = 'edit';
        $data = Floatmenu::where('id', $id)->first();
        return view('pages.create_floatmenu',compact('status','data'));
    }

    public function update_sosmed(Request $request)
    {
        foreach ($request->id as $key => $value) {
            # code...
            Sosmed::where('id', $value)->update([
                'sosmed_link' => $request->link[$key]
            ]);
        }
        return redirect()->back()->with('success','sosial media berhasil di update');
    }

}
