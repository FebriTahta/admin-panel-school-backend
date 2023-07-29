<?php

namespace App\Http\Controllers;
use App\Models\Alumni;
use App\Models\Jurusan;
use File;
use Image;
use Validator;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function admin_alumni()
    {
        $alumni = Alumni::orderBy('id','desc')->paginate(10);
        return view('pages.alumni_list', compact('alumni'));
    }

    public function create_alumni()
    {
        $status = 'create';
        $jurusan = Jurusan::get();
        return view('pages.create_alumni', compact('status','jurusan'));
    }

    function edit_alumni($id)
    {
        $status = 'edit';
        $jurusan = Jurusan::get();
        $alumni = Alumni::find($id);
        return view('pages.create_alumni', compact('status','jurusan','alumni'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_alumni(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'alumni_name'  => 'required|max:100',
            'jurusan_id'  => 'required|',
            'alumni_pekerjaan'  => 'required|',
            'alumni_alamatpekerjaan'  => 'required|',
            'alumni_tahunmasuk'  => 'required|',
            'alumni_tahunkeluar'  => 'required|',
            'alumni_telp'  => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('alumni_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Alumni::find($request->id);
                    $image_path1 = public_path("alumni_image\\".$datas->alumni_image);
                    $image_path2 = public_path("image_alumni\\".$datas->alumni_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->alumni_image->getClientOriginalExtension();
                $request->file('alumni_image')->move('alumni_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('alumni_image/'.$filename), public_path('image_alumni/'.$thumbnail));

                $largethumbnailpath = public_path('alumni_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Alumni::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'alumni_name'        => $request->alumni_name,
                        'alumni_telp'        => $request->alumni_telp,
                        'jurusan_id'         => $request->jurusan_id,
                        'alumni_tahunmasuk'  => $request->alumni_tahunmasuk,
                        'alumni_tahunkeluar' => $request->alumni_tahunkeluar,
                        'alumni_pekerjaan'   => $request->alumni_pekerjaan,
                        'alumni_alamatpekerjaan' => $request->alumni_alamatpekerjaan,
                        'alumni_image'       => $filename,
                    ]
                );

            }else{
                $data = Alumni::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'alumni_name'        => $request->alumni_name,
                        'alumni_telp'        => $request->alumni_telp,
                        'jurusan_id'         => $request->jurusan_id,
                        'alumni_tahunmasuk'  => $request->alumni_tahunmasuk,
                        'alumni_tahunkeluar' => $request->alumni_tahunkeluar,
                        'alumni_pekerjaan'   => $request->alumni_pekerjaan,
                        'alumni_alamatpekerjaan' => $request->alumni_alamatpekerjaan,
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function set_alumni($id)
    {
        $alumni = Alumni::find($id);
        if ($alumni->alumni_status == 0) {
            # code...
            $alumni->update(['alumni_status'=> 1]);
            return response()->json(['status'=>200,'message'=>'status alumni telah diaktifkan dan ditampilkan']);
        }else {
            # code...
            $alumni->update(['alumni_status'=> 0]);
            return response()->json(['status'=>200,'message'=>'status alumni telah dinonaktifkan dan tidak ditampilkan']);
        }
    }

    public function hapus_alumni(Request $request)
    {
        $data = Alumni::find($request->id);
        $image_path1 = public_path("alumni_image\\".$data->alumni_image);
        $image_path2 = public_path("image_alumni\\".$data->alumni_image);
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
                'message'       => 'alumni Has Been Deleted',
            ]
        );
    }
}
