<?php

namespace App\Http\Controllers;
use App\Models\News;
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
        $berita = News::with('kategori')->orderBy('id','desc')->paginate(10);
        return view('pages.news_list',compact('berita'));
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
        unlink($image_path1);
        unlink($image_path2);
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
                    $image_path1 = public_path("news_image\\".$datas->payment_image);
                    $image_path2 = public_path("image_news\\".$datas->payment_image);
                    unlink($image_path1);
                    unlink($image_path2);
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
}
