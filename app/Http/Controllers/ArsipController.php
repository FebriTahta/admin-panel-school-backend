<?php

namespace App\Http\Controllers;
use App\Models\Arsip;
use App\Models\Kategoribuku;
use Validator;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Http\Request;

class ArsipController extends Controller
{
    public function admin_arsip()
    {
        $data = Arsip::paginate(10);
        
        return view('pages.arsip_list',compact('data'));
    }

    public function create_arsip()
    {
        $status = 'create';
        $kategoribuku = Kategoribuku::get();
        return view('pages.create_arsip',compact('status','kategoribuku'));
    }

    public function edit_arsip($id)
    {
        $data = Arsip::find($id);
        $status = 'edit';
        $kategoribuku = Kategoribuku::get();
        return view('pages.create_arsip',compact('status','kategoribuku','data'));

    }

    public function remove_arsip(Request $request)
    {
        if ($request->id) {
            # code...
            $data = Arsip::find($request->id);
            $data->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Arsip Telah Dihapus'
            ]);
        }else {
            # code...
            return response()->json([
                'status'=>400,
                'message'=>'Pilih Arsip Terlebih Dahulu'
            ]);
        }
    }

    public function new_kategoribuku(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategoribuku_name'  => 'required'
        ]);

        if ($validator->fails()) {
            
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);

        }else {

            $data = Kategoribuku::updateOrCreate(
                [
                    'id'=> $request->id,
                ],
                [
                    'kategoribuku_name'         => $request->kategoribuku_name,
                    'kategoribuku_slug'         => Str::slug($request->kategoribuku_name),
                ]
            );

            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function pilih_kategoribuku($id)
    {
        $data = Kategoribuku::find($id);
        return response()->json(['status'=>200,'message'=> $data->kategoribuku_name.' Telah Dilipih','data'=>$data->kategoribuku_name]);
    }

    public function update_kategoribuku(Request $request)
    {
        if ($request->id) {
            # code...
            $data = Kategoribuku::find($request->id);
            $data->update([
                'kategoribuku_name' => $request->kategoribuku_name,
                'kategoribuku_slug' => Str::slug($request->kategoribuku_name),
            ]);
            return response()->json([
                'status' => 200,
                'message'=> "KATEGORI BUKU BERHASIL DI AUDIT",
            ]);
        }else {
            # code...
            return response()->json([
                'status' => 400,
                'message'=> "PILIH KATEGORI BUKU TERLEBIH DAHULU",
            ]);
        }
    }

    public function hapus_kategoribuku(Request $request)
    {
        if ($request->id) {
            # code...
            $data = Kategoribuku::find($request->id);
            if ($data->arsip->count() > 0) {
                # code...
                return response()->json([
                    'status' => 400,
                    'message'=> "TIDAK DAPAT MENGHAPUS KATEGORI YANG TERHUBUNG KE ARSIP",
                ]);
            }else {
                # code...
                $data->delete();
                return response()->json([
                    'status' => 200,
                    'message'=> "KATEGORI BERHASIL DIHAPUS",
                ]);
            }

        }else {
            # code...
            return response()->json([
                'status' => 400,
                'message'=> "PILIH KATEGORI BUKU TERLEBIH DAHULU",
            ]);
        }
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_arsip(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'arsip_name'  => 'required',
            'arsip_file'  => 'required',
            'kategoribuku_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('arsip_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Arsip::find($request->id);
                    $image_path1 = public_path("arsip_image\\".$datas->arsip_image);
                    $image_path2 = public_path("image_arsip\\".$datas->arsip_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->arsip_image->getClientOriginalExtension();
                $request->file('arsip_image')->move('arsip_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('arsip_image/'.$filename), public_path('image_arsip/'.$thumbnail));

                $largethumbnailpath = public_path('arsip_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                if ($request->hasFile('arsip_file')) {
                    # code exist edit...
                    if ($request->id !== null) {
                        # code...
                        $datas = Arsip::find($request->id);
                        $file_path = public_path("arsip_file\\".$datas->arsip_file);
                        if (File::exists($file_path)) {
                            # code...
                            unlink($file_path);
                        }
                    }
                    # code new
                    $arsip_file    = time().'-'.$request->arsip_file->getClientOriginalName();
                    $request->file('arsip_file')->move('arsip_file/',$arsip_file);

                    $data = Arsip::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            'arsip_name'         => $request->arsip_name,
                            'arsip_slug'         => Str::slug($request->arsip_name),
                            'arsip_file'         => $arsip_file,
                            'arsip_image'        => $filename,
                            'kategoribuku_id'    => $request->kategoribuku_id
                        ]
                    );

                }else {
                    # code...
                    $data = Arsip::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            'arsip_name'         => $request->arsip_name,
                            'arsip_slug'         => Str::slug($request->arsip_name),
                            'arsip_image'        => $filename,
                            'kategoribuku_id'    => $request->kategoribuku_id
                        ]
                    );
                }

            }else{

                if ($request->hasFile('arsip_file')) {
                    # code exist edit...
                    if ($request->id !== null) {
                        # code...
                        $datas = Arsip::find($request->id);
                        $file_path = public_path("arsip_file\\".$datas->arsip_file);
                        if (File::exists($file_path)) {
                            # code...
                            unlink($file_path);
                        }
                    }
                    # code new
                    $arsip_file    = time().'-'.$request->arsip_file->getClientOriginalName();
                    $request->file('arsip_file')->move('arsip_file/',$arsip_file);

                    $data = Arsip::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            'arsip_name'         => $request->arsip_name,
                            'arsip_slug'         => Str::slug($request->arsip_name),
                            'arsip_file'         => $arsip_file,
                            'kategoribuku_id'    => $request->kategoribuku_id
                        ]
                    );

                }else {
                    # code...
                    $data = Arsip::updateOrCreate(
                        [
                            'id'=> $request->id,
                        ],
                        [
                            'arsip_name'         => $request->arsip_name,
                            'arsip_slug'         => Str::slug($request->arsip_name),
                            'kategoribuku_id'    => $request->kategoribuku_id
                        ]
                    );
                }
            }

            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }
}
