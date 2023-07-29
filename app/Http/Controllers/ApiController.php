<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Kategori;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Profile;
use App\Models\Kesiswaan;
use App\Models\Banner;
use App\Models\Alumni;
use File;
use Image;
use DB;
use Validator;
use App\Helpers\ApiFormatter;
use App\Models\Infoppdb;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function hot_news()
    {
        $data = News::with('kategori')->orderBy('id','desc')->limit(3)->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function recent_news()
    {
        $data = News::with('kategori')->orderBy('id','desc')->limit(3)->get();
        $datas= [];
        foreach ($data as $key => $value) {
            # code...
            if ($key == "1" || $key == "2") {
                # code...
                $datas[] = $value;
            }
        }

        $real = $datas;
        if ($real) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$real);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }   
    }

    public function preview_jurusan()
    {
        $data = Jurusan::limit(6)->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }  
    }

    public function detail_jurusan($jurusan_slug)
    {
        $data = Jurusan::where('jurusan_slug',$jurusan_slug)->first();

        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function preview_guru()
    {
        $data = Guru::limit(6)->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }  
    }

    public function daftar_guru()
    {
        $data = Guru::all();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        } 
    }

    public function daftar_berita()
    {
        $data = News::orderBy('id','desc')->whereHas('kategori',function($query){
            $query->where('kategori_slug','!=','prestasi')->where('kategori_slug','!=','program-unggulan');
        })->with('kategori')->paginate(10);
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_prestasi()
    {
        $data = News::orderBy('id','desc')->whereHas('kategori',function($query){
            $query->where('kategori_slug', 'prestasi'); 
        })->with('kategori')->paginate(9);
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_program_unggulan()
    {
        $data = News::orderBy('id','desc')->whereHas('kategori',function($query){
            $query->where('kategori_slug', 'program-unggulan'); 
        })->with('kategori')->paginate(9);
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_kategori()
    {
        $data = Kategori::withCount('news')->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function berita_populer()
    {
        $data = News::orderBy('news_view','desc')->limit(3)->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function baca_berita($news_slug)
    {
        $data = News::where('news_slug',$news_slug)->first();
        $add_view = $data->update([
            'news_view' => $data->news_view + 1
        ]);

        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }

    }

    public function daftar_berita_berdasarkan_kategori($kategori_slug)
    {
        $data = News::whereHas('kategori',function($query) use ($kategori_slug){
            $query->where('kategori_slug',$kategori_slug);
        })->with('kategori')->paginate(10);

        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function display_banner()
    {
        $data1 = Banner::where('banner_highlight',1)->select('id','banner_name','banner_highlight','banner_desc','banner_slug','banner_image');
        $data2 = News::where('news_highlight', 1)->select('id','news_title','news_highlight','news_desc','news_slug','news_image');
        $banner = $data1->union($data2)->get();
        
        $img = [];
        foreach ($banner as $key => $item) {
            # code...
            if (File::exists(public_path("banner_image\\".$item->banner_image))) {
                # code...
                $img[] = '/banner_image/';
            }else {
                # code...
                $img[] = '/news_image/';
            }
        }

        $data = [];
        foreach ($banner as $key => $value) {
            # code...
            $data[] = [
                'id'=>$value->id,
                'banner_name'=>$value->banner_name,
                'banner_slug'=>$value->banner_slug,
                'banner_image'=>$value->banner_image,
                'banner_desc'=>$value->banner_desc,
                'banner_path'=>$img[$key],
            ];
        }

        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function display_profile()
    {
        $data = Profile::first();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_jurusan()
    {
        $data = Jurusan::get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function total_siswa()
    {
        $data = Jurusan::select(DB::raw("SUM(jurusan_anak) as total_anak"), 
        DB::raw("COUNT(jurusan_kelas) as total_jurusan"),DB::raw("SUM(jurusan_kelas) as total_kelas"))->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function preview_kesiswaan()
    {
        $data = Kesiswaan::with('kategori','dokumen')->orderBy('id','desc')->limit(3)->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_kesiswaan()
    {
        $data = $data = Kesiswaan::with('kategori','dokumen')->orderBy('id','desc')->paginate(6);
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_kesiswaan_berdasarkan_kategori($kategori_slug)
    {
        $data = Kesiswaan::whereHas('kategori',function($query) use ($kategori_slug){
            $query->where('kategori_slug',$kategori_slug);
        })->with('kategori','dokumen')->paginate(10);

        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function detail_kesiswaan($kesiswaan_slug)
    {
        $data = Kesiswaan::where('kesiswaan_slug',$kesiswaan_slug)->with('kategori','dokumen')->first();

        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function las_infoppdb()
    {
        $data = Infoppdb::latest()->first();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_infoppdb()
    {
        $data = Infoppdb::paginate(10);
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function detail_infoppdb($slug)
    {
        $data = Infoppdb::where('infoppdb_slug',$slug)->first();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
        
    }

    public function daftar_alumni()
    {
        $data = $data = Alumni::with(['jurusan'])->orderBy('id','desc')->paginate(20);
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function daftar_jurusan_alumni()
    {
        $data = Jurusan::where('alumni_status',1)->whereHas('alumni')->withCount('alumni')->get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }

    public function add_alumni_and_ulasan(Request $request)
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
            return response()->json(['status'=>200,'message'=>'data alumni berhasil disimpan, menunggu persetujuan admin untuk menampilkan data'],200);
        }
    }
}
