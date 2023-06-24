<?php

namespace App\Http\Controllers;
use App\Models\Paymenttype;
use App\Models\Paymentcontrol;
use Image;
use File;
use Validator;
use Crypt;
use Illuminate\Http\Request;

class PaymenttypeController extends Controller
{
    public function admin_payment_type()
    {
        $paymenttype = Paymenttype::get();
        $payment_aktif = Paymenttype::where('payment_status','aktif')->get();
        return view('pages.paymenttype', compact('paymenttype','payment_aktif'));
    }

    public function new_payment_type()
    {
        $edit = 'no';
        $paymenttype = null;
        return view('pages.form_paymenttype',compact('edit','paymenttype')); 
    }

    public function remove_payment_type(Request $request)
    {
        $data = Paymenttype::find($request->id);
        $image_path1 = public_path("pmnt_image\\".$data->payment_image);
        $image_path2 = public_path("image_pmnt\\".$data->payment_image);
        unlink($image_path1);
        unlink($image_path2);
        $data->delete();
        # code...
        return response()->json(
            [
                'status'        => 200,
                'message'       => 'Payment Type Has Been Deleted',
            ]
        );
    }

    public function edit_payment_type($id)
    {
        $edit = 'yes';
        $id = Crypt::decrypt($id);
        $paymenttype = Paymenttype::findOrFail($id);
        return view('pages.form_paymenttype',compact('edit','paymenttype'));
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function store_payment_type(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_name'    => 'required|max:100',
            'payment_value'  => 'required|',
            'payment_status'    => 'required|',
            'payment_desc'    => 'required|',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {

            $fix;
            if (substr($request->payment_value,0,3) == 'Rp.') {
                # code...
                $val = substr($request->payment_value,3);
                $fix = str_replace(".","",$val);
            }else {
                # code...
                $fix = $request->payment_value;
            }

            if($request->hasFile('payment_image')) {
                if ($request->id !== null) {
                    # code...
                    $datas = Paymenttype::find($request->id);
                    $image_path1 = public_path("pmnt_image\\".$datas->payment_image);
                    $image_path2 = public_path("image_pmnt\\".$datas->payment_image);
                    unlink($image_path1);
                    unlink($image_path2);
                }

                $filename    = time().'.'.$request->payment_image->getClientOriginalExtension();
                $request->file('payment_image')->move('pmnt_image/',$filename);
                $thumbnail   = $filename;
                File::copy(public_path('pmnt_image/'.$filename), public_path('image_pmnt/'.$thumbnail));

                $largethumbnailpath = public_path('pmnt_image/'.$thumbnail);
                $this->createThumbnail($largethumbnailpath, 800, 800);

                $data = Paymenttype::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'payment_name'      => $request->payment_name,
                        'payment_value'     => $fix,
                        'payment_image'     => $filename,
                        'payment_status'    => $request->payment_status,
                        'payment_thumbnail' => $thumbnail,
                        'payment_desc'      => $request->payment_desc,
                    ]
                );
            }else{
                $data = Paymenttype::updateOrCreate(
                    [
                        'id'=> $request->id,
                    ],
                    [
                        'payment_name'      => $request->payment_name,
                        'payment_value'     => $fix,
                        'payment_status'    => $request->payment_status,
                        'payment_desc'    => $request->payment_desc,
                    ]
                );
            }
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function form_payment($id)
    {
        $id = Crypt::decrypt($id);
        $paymenttype = Paymenttype::find($id);
        return view('pages.form_payment',compact('paymenttype'));
    }

    public function payment_setting()
    {
        $paymentcontrol = Paymentcontrol::first();
        return view('pages.payment_setting',compact('paymentcontrol'));
    }
}
