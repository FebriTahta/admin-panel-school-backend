<?php
namespace App\Http\Controllers;
use Validator;
use App\Models\Banner;
use Illuminate\Support\Str;
use Image;
use File;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function admin_banner()
    {
        $banner = Banner::paginate(10);
        return view('pages.banner_list',compact('banner'));
    }

    public function admin_create_banner()
    {
        $status = 'create';
        return view('pages.create_banner',compact('status'));
    }

    public function admin_edit_banner($id)
    {
        $banner = Banner::find($id);
        $status = 'edit';
        return view('pages.create_banner',compact('banner','status'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function new_banner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'banner_name'  => 'required|max:100',
            'banner_desc'  => 'required|',
            // 'banner_jabatan' => 'required'
            // 'news_image'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('banner_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Banner::find($request->id);
                    $image_path1 = public_path("banner_image\\".$datas->banner_image);
                    $image_path2 = public_path("image_banner\\".$datas->banner_image);
                    unlink($image_path1);
                    unlink($image_path2);
                }

                $filename    = time().'.'.$request->banner_image->getClientOriginalExtension();
                $request->file('banner_image')->move('banner_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('banner_image/'.$filename), public_path('image_banner/'.$thumbnail));

                $largethumbnailpath = public_path('banner_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Banner::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'banner_name'        => $request->banner_name,
                        'banner_slug'         => Str::slug($request->banner_name),
                        'banner_desc'         => $request->banner_desc,
                        'banner_image'        => $filename,
                    ]
                );

            }else{
                $data = Banner::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'banner_name'        => $request->banner_name,
                        'banner_slug'         => Str::slug($request->banner_name),
                        'banner_desc'         => $request->banner_desc,
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function remove_banner(Request $request)
    {
        $data = Banner::find($request->id);
        $image_path1 = public_path("banner_image\\".$data->banner_image);
        $image_path2 = public_path("image_banner\\".$data->banner_image);
        unlink($image_path1);
        unlink($image_path2);
        $data->delete();
        # code...
        return response()->json(
            [
                'status'        => 200,
                'message'       => 'banner Has Been Deleted',
            ]
        );
    }
}
