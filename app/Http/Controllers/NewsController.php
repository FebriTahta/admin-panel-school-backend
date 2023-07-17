<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Banner;
use Validator;
use Image;
use File;
use Illuminate\Support\Str;
use App\Models\Kategori;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function admin_daftar_berita()
    {
        $berita = News::whereHas('kategori',function($q){
            return $q->where('kategori_slug','!=','prestasi');
        })->orderBy('id','desc')->paginate(10);
        return view('pages.news_list',compact('berita'));
    }

    public function set_banner($id)
    {
        $data = News::find($id);
        $data2 = Banner::find($id);
        if ($data2 == null && $data !== null) {
            # code...
            if ($data->news_highlight == 0) {
                # code...
                $data->update([
                    'news_highlight' => 1
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=> 'Berita telah di set menjadi Banner'
                ]);
            }else {
                # code...
                $data->update([
                    'news_highlight' => 0
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=> 'Berita telah dinonaktifkan dari banner'
                ]);
            }
        }else {
            # code...
            if ($data2->banner_highlight == 0) {
                # code...
                $data2->update([
                    'banner_highlight' => 1
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=> 'Berita telah di set menjadi Banner'
                ]);
            }else {
                # code...
                $data2->update([
                    'banner_highlight' => 0
                ]);
                return response()->json([
                    'status'=>200,
                    'message'=> 'Berita telah dinonaktifkan dari banner'
                ]);
            }
        }
        
    }

    public function admin_create_berita()
    {
        $status   = 'create';
        $kategori = Kategori::get();
        return view('pages.create_news',compact('kategori','status'));
    }

    public function edit_berita($id)
    {
        $status = 'edit';
        $kategori = Kategori::get();
        $berita = News::findOrFail($id);
        return view('pages.create_news',compact('kategori','status','berita'));
    }

    public function remove_berita(Request $request)
    {
        $data = News::find($request->id);
        $image_path1 = public_path("news_image\\".$data->news_image);
        $image_path2 = public_path("image_news\\".$data->news_image);
        if (File::exists($image_path1)) {
            # code...
            unlink($image_path1);
        }

        if (File::exists($image_path2)) {
            # code...
            unlink($image_path2);
        }
        if (count($data->kategori) > 0) {
            # code...
            $data->kategori->detach();
        }
        $data->delete();
        # code...
        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Berita Type Has Been Deleted',
            ]
        );
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_berita(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_title'    => 'required|max:100',
            'news_desc'  => 'required|',
            // 'news_image'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('news_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = News::find($request->id);
                    $image_path1 = public_path("news_image\\".$datas->news_image);
                    $image_path2 = public_path("image_news\\".$datas->news_image);
                    if (File::exists($image_path1)) {
                        # code...
                        unlink($image_path1);
                    }

                    if (File::exists($image_path2)) {
                        # code...
                        unlink($image_path2);
                    }
                }

                $filename    = time().'.'.$request->news_image->getClientOriginalExtension();
                $request->file('news_image')->move('news_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('news_image/'.$filename), public_path('image_news/'.$thumbnail));

                $largethumbnailpath = public_path('news_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = News::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'news_title'        => $request->news_title,
                        'news_slug'         => Str::slug($request->news_title),
                        'news_desc'         => $request->news_desc,
                        'news_image'        => $filename,
                        'news_view'         => 0,
                    ]
                );

                if (count($request->kategori_id) > 0) {
                    # code...
                    $kategori_id    = $request->kategori_id;
                    $kategori       = Kategori::whereIn('id', $kategori_id)->get();
                    $data->kategori()->sync($kategori);
                }

            }else{
                $data = News::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'news_title'        => $request->news_title,
                        'news_slug'         => Str::slug($request->news_title),
                        'news_desc'         => $request->news_desc,
                    ]
                );

                if (count($request->kategori_id) > 0) {
                    # code...
                    $kategori_id    = $request->kategori_id;
                    $kategori       = Kategori::whereIn('id', $kategori_id)->get();
                    $data->kategori()->sync($kategori);
                }
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function admin_prestasi()
    {
        $berita = News::whereHas('kategori', function($query){
            $query->where('kategori_slug', 'prestasi');
        })->with('kategori')->paginate(10);
        return view('pages.prestasi_list',compact('berita'));
    }

    public function admin_create_prestasi()
    {
        $status = 'create';
        $kategori = Kategori::where('kategori_slug','prestasi')->get();
        return view('pages.create_prestasi',compact('status','kategori'));
    }

    public function admin_program_unggulan()
    {
        $berita = News::whereHas('kategori', function($query){
            $query->where('kategori_slug', 'program-unggulan');
        })->with('kategori')->paginate(10);
        return view('pages.program_unggulan_list',compact('berita'));
    }

    public function admin_create_program_unggulan()
    {
        $status = 'create';
        $kategori = Kategori::where('kategori_slug','program-unggulan')->get();
        return view('pages.create_program_unggulan',compact('status','kategori'));
    }
}
