<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function admin_kategori()
    {
        $kategori = Kategori::paginate(10);
        return view('pages.kategori',compact('kategori'));
    }

    public function new_kategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_name'    => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            $data = Kategori::updateOrCreate(
                [
                    'id'=> $request->id,
                ],
                [
                    'kategori_name'     => $request->kategori_name,
                    'kategori_slug'     => Str::slug($request->kategori_name) 
                ]
            );
            
            return response()->json([
                'status'=>200,
                'message'=> 'Kategori has been saved'
            ]);
        }
    }

    public function remove_kategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'    => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);

        }else {
            $data = Kategori::findOrFail($request->id)->delete();
            
            return response()->json([
                'status'=>200,
                'message'=> 'Kategori has been removed'
            ]);
        }        
    }
}
