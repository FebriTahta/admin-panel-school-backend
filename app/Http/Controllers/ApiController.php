<?php

namespace App\Http\Controllers;
use App\Models\News;
use App\Models\Kategori;
use App\Models\Jurusan;
use App\Models\Guru;
use App\Models\Banner;
use App\Helpers\ApiFormatter;
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

    // page guru
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
        $data = News::orderBy('id','desc')->with('kategori')->paginate(10);
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
        $data = Banner::get();
        if ($data) {
            # code...
            return ApiFormatter::createApi(200, 'success' ,$data);
        }else {
            # code...
            return ApiFormatter::createApi(400, 'failed');
        }

    }
}
