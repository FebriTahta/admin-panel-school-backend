<?php

namespace App\Http\Controllers;
use App\Models\Kesiswaan;
use App\Models\Dokumen;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Validator;
use File;
use Image;
use Illuminate\Http\Request;

class KesiswaanController extends Controller
{
    public function admin_kesiswaan()
    {
        $kesiswaan = Kesiswaan::with('kategori')->withCount('dokumen')->paginate(10);
        return view('pages.kesiswaan_list',compact('kesiswaan'));
    }

    public function admin_edit_kesiswaan($id)
    {

    }

    public function admin_create_kesiswaan()
    {
        $status = 'create';
        $kategori = Kategori::get();
        return view('pages.create_kesiswaan',compact('status','kategori'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_kesiswaan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kesiswaan_title'    => 'required|max:100',
            'kesiswaan_desc'  => 'required|',
            // 'kesiswaan_image'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('kesiswaan_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Kesiswaan::find($request->id);
                    $image_path1 = public_path("kesiswaan_image\\".$datas->kesiswaan_image);
                    $image_path2 = public_path("image_kesiswaan\\".$datas->kesiswaan_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->kesiswaan_image->getClientOriginalExtension();
                $request->file('kesiswaan_image')->move('kesiswaan_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('kesiswaan_image/'.$filename), public_path('image_kesiswaan/'.$thumbnail));

                $largethumbnailpath = public_path('kesiswaan_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Kesiswaan::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'kesiswaan_title'        => $request->kesiswaan_title,
                        'kesiswaan_slug'         => Str::slug($request->kesiswaan_title),
                        'kesiswaan_desc'         => $request->kesiswaan_desc,
                        'kesiswaan_image'        => $filename,
                    ]
                );

                if ($request->kategori_id) {
                    # code...
                    if (count($request->kategori_id) > 0) {
                        # code...
                        $kategori_id    = $request->kategori_id;
                        $kategori       = Kategori::whereIn('id', $kategori_id)->get();
                        $data->kategori()->sync($kategori);
                    }
                }

                $files = [];
                $dokumenName = [];
                $namaDokumen = [];
                
                if ($request->file('dokumen_docs')){
                    foreach($request->file('dokumen_docs') as $key => $file)
                    {
                        $dokumenName = time().'.'.$file->getClientOriginalExtension();  
                        $file->move(public_path('uploads'), $dokumenName);
                        $namaDokumen[] = $request->dokumen_name[$key];
                        $files[] = [
                            "dokumen_name" => $request->dokumen_name[$key],
                            "dokumen_slug" => Str::slug($request->dokumen_name[$key]),
                            "dokumen_docs" => $dokumenName
                        ];
                    }
                    
                    Dokumen::insert($files);
                    $docs = Dokumen::whereIn('dokumen_name',$namaDokumen)->get();
                    $data->dokumen()->sync($docs);
                }

            }else{
                $data = Kesiswaan::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'kesiswaan_title'        => $request->kesiswaan_title,
                        'kesiswaan_slug'         => Str::slug($request->kesiswaan_title),
                        'kesiswaan_desc'         => $request->kesiswaan_desc,
                    ]
                );

                if ($request->kategori_id) {
                    # code...
                    if (count($request->kategori_id) > 0) {
                        # code...
                        $kategori_id    = $request->kategori_id;
                        $kategori       = Kategori::whereIn('id', $kategori_id)->get();
                        $data->kategori()->sync($kategori);
                    }
                }

                $files = [];
                $dokumenName = [];
                $namaDokumen = [];
                
                if ($request->file('dokumen_docs')){
                    foreach($request->file('dokumen_docs') as $key => $file)
                    {
                        $dokumenName = time().'.'.$file->getClientOriginalExtension();  
                        $file->move(public_path('uploads'), $dokumenName);
                        $files[] = [
                            "dokumen_name" => $request->dokumen_name[$key],
                            "dokumen_slug" => Str::slug($request->dokumen_name[$key]),
                            "dokumen_docs" => $dokumenName
                        ];
                    }
                    
                    Dokumen::insert($files);
                    $docs = Dokumen::whereIn('dokumen_name',$namaDokumen)->get();
                    $data->dokumen()->sync($docs);
                }
            }
            return response()->json(['status'=>200,'message'=>$namaDokumen]);
        }
    }
    
    public function remove_kesiswaan()
    {

    }
}
