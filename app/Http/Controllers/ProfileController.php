<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use Validator;
use File;
use Image;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function admin_profile()
    {
        $profile = Profile::first();
        $status = '';
        if ($profile == null) {
            # code...
            $status = 'kosong';
            return view('pages.profile',compact('status'));
        }else {
            # code...
            $status = 'ada';
            return view('pages.profile',compact('status','profile'));
        }
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function submit_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'profile_map'  => 'required|',
            'profile_desc'  => 'required|',
            'profile_alamat' => 'required',
            'profile_video'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {
            if($request->hasFile('profile_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Profile::find($request->id);
                    $image_path1 = public_path("profile_image\\".$datas->profile_image);
                    $image_path2 = public_path("image_profile\\".$datas->profile_image);
                    unlink($image_path1);
                    unlink($image_path2);
                }
    
                $filename    = time().'.'.$request->profile_image->getClientOriginalExtension();
                $request->file('profile_image')->move('profile_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('profile_image/'.$filename), public_path('image_profile/'.$thumbnail));
    
                $largethumbnailpath = public_path('profile_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);
    
                $data = Profile::updateOrCreate(['id'=> $request->id],
                [
                    'profile_map' => $request->profile_map,
                    'profile_desc' => $request->profile_desc,
                    'profile_image' => $filename,
                    'profile_video' => $request->profile_video,
                    'profile_alamat' => $request->profile_alamat,
                ]);
    
            }else{
                $data = Profile::updateOrCreate(['id'=> $request->id],
                [
                    'profile_map' => $request->profile_map,
                    'profile_desc' => $request->profile_desc,
                    'profile_video' => $request->profile_video,
                    'profile_alamat' => $request->profile_alamat,
                ]);
            }

            return response()->json([
                'status'=>200,
                'message'=>'Profile diperbarui'
            ]);
        }
    }
}
