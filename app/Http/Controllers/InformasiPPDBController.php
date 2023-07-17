<?php

namespace App\Http\Controllers;
use App\Models\Infoppdb;
use File;
use Image;
use Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class InformasiPPDBController extends Controller
{
    public function informasi_ppdb()
    {
        $data = Infoppdb::paginate(10);
        return view('pages.infoppdb',compact('data'));
    }

    public function create_infoppdb()
    {
        $status = 'create';
        return view('pages.create_infoppdb',compact('status'));
    }

    public function edit_infoppdb($id)
    {
        $status = 'edit';
        $data = Infoppdb::find($id);
        return view('pages.create_infoppdb',compact('status','data'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_infoppdb(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'infoppdb_title'  => 'required|max:100',
            'infoppdb_desc'  => 'required|',
            'infoppdb_yearone' => 'required',
            'infoppdb_yeartwo' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('infoppdb_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Infoppdb::find($request->id);
                    $image_path1 = public_path("infoppdb_image\\".$datas->infoppdb_image);
                    $image_path2 = public_path("infoppdb_banner\\".$datas->infoppdb_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->infoppdb_image->getClientOriginalExtension();
                $request->file('infoppdb_image')->move('infoppdb_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('infoppdb_image/'.$filename), public_path('image_infoppdb/'.$thumbnail));

                $largethumbnailpath = public_path('infoppdb_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Infoppdb::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'infoppdb_title'        => $request->infoppdb_title,
                        'infoppdb_slug'         => Str::slug($request->infoppdb_title),
                        'infoppdb_desc'         => $request->infoppdb_desc,
                        'infoppdb_yearone'      => $request->infoppdb_yearone,
                        'infoppdb_yeartwo'      => $request->infoppdb_yeartwo,
                        'infoppdb_image'        => $filename,
                    ]
                );

            }else{
                $data = Infoppdb::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'infoppdb_title'        => $request->infoppdb_title,
                        'infoppdb_slug'         => Str::slug($request->infoppdb_title),
                        'infoppdb_desc'         => $request->infoppdb_desc,
                        'infoppdb_yearone'      => $request->infoppdb_yearone,
                        'infoppdb_yeartwo'      => $request->infoppdb_yeartwo,
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function hapus_infoppdb(Request $request)
    {
        $data = Infoppdb::find($request->id);
        $image_path1 = public_path("infoppdb_image\\".$data->infoppdb_image);
        $image_path2 = public_path("image_infoppdb\\".$data->infoppdb_image);
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
                'message'       => 'Info PPDB Has Been Deleted',
            ]
        );
    }
}
