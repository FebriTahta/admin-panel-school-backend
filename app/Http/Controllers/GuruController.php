<?php

namespace App\Http\Controllers;
use App\Models\Guru;
use Validator;
use File;
use Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function admin_daftar_guru()
    {
        $guru = Guru::paginate(10);
        return view('pages.guru_list',compact('guru'));
    }

    public function admin_create_guru()
    {
        $status = 'create';
        return view('pages.create_guru',compact('status'));
    }

    public function admin_edit_guru($id)
    {
        $status = 'edit';
        $guru = Guru::find($id);
        return view('pages.create_guru',compact('status','guru'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_guru(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'guru_name'  => 'required|max:100',
            'guru_wa'  => 'required|',
            'guru_jabatan' => 'required'
            // 'news_image'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('guru_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Guru::find($request->id);
                    $image_path1 = public_path('guru_image/'.$datas->guru_image);
                    $image_path2 = public_path('image_guru/'.$datas->guru_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->guru_image->getClientOriginalExtension();
                $request->file('guru_image')->move('guru_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('guru_image/'.$filename), public_path('image_guru/'.$thumbnail));

                $largethumbnailpath = public_path('guru_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Guru::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'guru_name'        => $request->guru_name,
                        'guru_slug'         => Str::slug($request->guru_name),
                        'guru_wa'         => $request->guru_wa,
                        'guru_image'        => $filename,
                        'guru_jabatan'      => $request->guru_jabatan
                    ]
                );

            }else{
                $data = Guru::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'guru_name'        => $request->guru_name,
                        'guru_slug'         => Str::slug($request->guru_name),
                        'guru_wa'         => $request->guru_wa,
                        'guru_jabatan'      => $request->guru_jabatan
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function remove_guru(Request $request)
    {
        $data = Guru::find($request->id);
        $image_path1 = public_path("guru_image/".$data->guru_image);
        $image_path2 = public_path("image_guru/".$data->guru_image);
        if (File::exists($image_path1)) {
            # code...
            unlink($image_path1);
        }
        if (File::exists($image_path2)) {
            # code...
            unlink($image_path2);
        }
        $data->delete();
        # code...
        return response()->json(
            [
                'status'        => 200,
                'message'       => 'guru Has Been Deleted',
            ]
        );
    }
}
