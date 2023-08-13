<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(ApiController::class)->group(function(){
    // home
    Route::get('hot-news','hot_news'); //ok
    Route::get('latest-news','latest_news'); 
    Route::get('recent-news','recent_news'); //ok
    Route::get('preview-jurusan','preview_jurusan'); //ok
    Route::get('preview-guru','preview_guru'); //ok
    Route::get('display-banner','display_banner'); //ok
    Route::get('display-profile','display_profile'); //ok
    Route::get('total-siswa','total_siswa'); //ok
    Route::get('preview-kesiswaan','preview_kesiswaan'); //ok
    Route::get('last-informasi-ppdb','las_infoppdb'); //ok
    Route::get('display-floatmenu','display_floatmenu'); 

    // page

    Route::get('daftar-guru','daftar_guru'); //ok
    Route::get('daftar-berita','daftar_berita'); //ok
    Route::get('daftar-prestasi','daftar_prestasi'); //ok
    Route::get('daftar-program-unggulan','daftar_program_unggulan'); //ok
    Route::get('daftar-kategori','daftar_kategori'); //ok
    Route::get('berita-populer','berita_populer'); //ok
    Route::get('baca-berita/{news_slug}','baca_berita'); //ok
    Route::get('daftar-berita-berdasarkan-kategori/{kategori_slug}','daftar_berita_berdasarkan_kategori'); //ok
    Route::get('daftar-jurusan','daftar_jurusan'); //ok
    Route::get('detail-jurusan/{slug_jurusan}','detail_jurusan'); //ok
    Route::get('daftar-kesiswaan','daftar_kesiswaan'); //ok
    Route::get('detail-kesiswaan/{kesiswaan_slug}','detail_kesiswaan'); //ok
    Route::get('daftar-kesiswaan-berdasarkan-kategori/{kategori_slug}','daftar_kesiswaan_berdasarkan_kategori'); //ok
    Route::get('daftar-informasi-ppdb','daftar_infoppdb'); //ok
    Route::get('detail-informasi-ppdb/{slug}','detail_infoppdb'); //ok
    Route::get('daftar-alumni','daftar_alumni'); //ok
    Route::get('daftar-jurusan-alumni','daftar_jurusan_alumni'); //ok
    Route::get('display-arsip','display_arsip'); //ok
    Route::get('daftar-arsip','daftar_arsip'); //ok
    Route::get('daftar-kategoribuku','daftar_kategoribuku'); //ok
    Route::get('display-brosur','display_brosur'); //ok

    Route::post('new-alumni','add_alumni_and_ulasan');
});
