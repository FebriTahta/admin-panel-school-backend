<?php

namespace App\Http\Controllers;
use App\Models\Jurusan;
use Validator;
use File;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function admin_daftar_jurusan()
    {
        $jurusan = Jurusan::paginate(10);
        return view('pages.jurusan_list',compact('jurusan'));
    }

    public function admin_create_jurusan()
    {
        $status = 'create';
        return view('pages.create_jurusan',compact('status'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_jurusan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jurusan_name'  => 'required|max:100',
            'jurusan_desc'  => 'required|',
            'jurusan_anak'  => 'required|',
            'jurusan_kelas'  => 'required|',
            // 'news_image'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('jurusan_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Jurusan::find($request->id);
                    $image_path1 = public_path("jurusan_image\\".$datas->jurusan_image);
                    $image_path2 = public_path("image_jurusan\\".$datas->jurusan_image);
                    unlink($image_path1);
                    unlink($image_path2);
                }

                $filename    = time().'.'.$request->jurusan_image->getClientOriginalExtension();
                $request->file('jurusan_image')->move('jurusan_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('jurusan_image/'.$filename), public_path('image_jurusan/'.$thumbnail));

                $largethumbnailpath = public_path('jurusan_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Jurusan::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'jurusan_name'        => $request->jurusan_name,
                        'jurusan_slug'         => Str::slug($request->jurusan_name),
                        'jurusan_desc'         => $request->jurusan_desc,
                        'jurusan_anak'         => $request->jurusan_anak,
                        'jurusan_kelas'         => $request->jurusan_kelas,
                        'jurusan_image'        => $filename,
                    ]
                );

            }else{
                $data = Jurusan::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'jurusan_name'        => $request->jurusan_name,
                        'jurusan_slug'         => Str::slug($request->jurusan_name),
                        'jurusan_desc'         => $request->jurusan_desc,
                        'jurusan_anak'         => $request->jurusan_anak,
                        'jurusan_kelas'         => $request->jurusan_kelas,
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function admin_edit_jurusan($id)
    {
        $status = 'edit';
        $jurusan = Jurusan::findOrFail($id);

        return view('pages.create_jurusan',compact('status','jurusan'));
    }

    public function remove_jurusan(Request $request)
    {
        $data = Jurusan::find($request->id);
        $image_path1 = public_path("jurusan_image\\".$data->jurusan_image);
        $image_path2 = public_path("image_jurusan\\".$data->jurusan_image);
        unlink($image_path1);
        unlink($image_path2);
        $data->delete();
        # code...
        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Jurusan Has Been Deleted',
            ]
        );
    }
}
