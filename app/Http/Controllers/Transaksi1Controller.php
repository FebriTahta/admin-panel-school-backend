<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Validator;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Transaksi1;
use App\Models\Paymenttype;
use Illuminate\Http\Request;

class Transaksi1Controller extends Controller
{
    public function transaksi1(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transaksi1_name'   => 'required|max:100',
            'transaksi1_email'  => 'required',
            'transaksi1_alamat' => 'required',
            'transaksi1_pos'    => 'required',
            'transaksi1_kota'   => 'required',
            'transaksi1_asal'   => 'required',
            'transaksi1_phone'  => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message'  => $validator->messages().'',
            ]);
        }else {

            $data = Transaksi1::updateOrCreate(
                [
                    'id'=> $request->transaksi1_id,
                ],
                [
                    'paymenttype_id'    => $request->paymenttype_id,
                    'transaksi1_uuid'  => Str::uuid(),
                    'transaksi1_name'   => $request->transaksi1_name,
                    'transaksi1_email'  => $request->transaksi1_email,
                    'transaksi1_alamat' => $request->transaksi1_alamat,
                    'transaksi1_pos'    => $request->transaksi1_pos,
                    'transaksi1_kota'   => $request->transaksi1_kota,
                    'transaksi1_asal'   => $request->transaksi1_asal,
                    'transaksi1_phone'  => $request->transaksi1_phone,
                    'transaksi1_status'  => 'unpaid',
                ]
            );
            return response()->json(['status'=>200,'message'=>'store success']);
        }
    }

    public function payment_transaksi1($transaksi1_uuid)
    {
        $transaksi1  = Transaksi1::where('transaksi1_uuid', $transaksi1_uuid)->first();
        $paymenttype = Paymenttype::where('id', $transaksi1->paymenttype_id)->first();

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $transaksi1_uuid,
                'gross_amount' => $paymenttype->payment_value,
            ],
            // 'item_details' => [
            //     [
            //         'id' => 1,
            //         'price' => '150000',
            //         'quantity' => 1,
            //         'name' => 'Flashdisk Toshiba 32GB',
            //     ],
            //     [
            //         'id' => 2,
            //         'price' => '60000',
            //         'quantity' => 2,
            //         'name' => 'Memory Card VGEN 4GB',
            //     ],
            // ],
            'customer_details' => [
                'first_name' => $transaksi1->transaksi1_name,
                'phone' => $transaksi1->transaksi1_phone,
            ]
        ];
        $snapToken = Snap::getSnapToken($params);
        return view('pages.payment_transaksi1',compact('transaksi1','paymenttype','snapToken'));
    }
}
