<?php

namespace App\Http\Controllers;
use App\Models\Brosur;
use Illuminate\Support\Str;
use Validator;
use Image;
use File;
use Illuminate\Http\Request;

class BrosurController extends Controller
{
    public function admin_brosur()
    {
        $data = Brosur::paginate();
        return view('pages.brosur_list',compact('data'));
    }

    public function create_brosur()
    {
        $status = 'create';
        return view('pages.create_brosur',compact('status'));
    }

    public function edit_brosur($id)
    {
        $status = 'edit';
        $data   = Brosur::find($id);
        return view('pages.create_brosur',compact('status','data'));
    }

    public function set_brosur($id)
    {
        $data2 = Brosur::find($id);
            if ($data2) {
                # code...
                if ($data2->brosur_highlight == 0) {
                    # code...
                    $data2->update([
                        'brosur_highlight' => 1
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=> 'Brosur telah di terbitkan'
                    ]);
                }else {
                    # code...
                    $data2->update([
                        'brosur_highlight' => 0
                    ]);
                    return response()->json([
                        'status'=>200,
                        'message'=> 'Brosur telah dinonaktifkan dari pop up'
                    ]);
                }
            }
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_brosur(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'brosur_name'  => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('brosur_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Brosur::find($request->id);
                    $image_path1 = public_path("brosur_image\\".$datas->brosur_image);
                    $image_path2 = public_path("image_brosur\\".$datas->brosur_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->brosur_image->getClientOriginalExtension();
                $request->file('brosur_image')->move('brosur_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('brosur_image/'.$filename), public_path('image_brosur/'.$thumbnail));

                $largethumbnailpath = public_path('brosur_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Brosur::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'brosur_name'        => $request->brosur_name,
                        'brosur_image'        => $filename,
                    ]
                );

            }else{
                $data = Brosur::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'brosur_name'        => $request->brosur_name,
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function hapus_brosur(Request $request)
    {
        if ($request->id) {
            # code...
            $data = Brosur::find($request->id);
            $data->delete();
            return response()->json(['status'=>200,'message'=>'hapus success']);
        }else {
            # code...
            return response()->json(['status'=>400,'message'=>'brosur tidak ditemukan']);
        }
    }
}
