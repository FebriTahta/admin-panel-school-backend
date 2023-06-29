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
    Route::get('hot-news','hot_news');
    Route::get('recent-news','recent_news');
    Route::get('preview-jurusan','preview_jurusan');
    Route::get('preview-guru','preview_guru');
    Route::get('display-banner','display_banner');
    Route::get('display-profile','display_profile');
    Route::get('total-siswa','total_siswa');

    // page

    Route::get('daftar-guru','daftar_guru');
    Route::get('daftar-berita','daftar_berita');
    Route::get('daftar-kategori','daftar_kategori');
    Route::get('berita-populer','berita_populer');
    Route::get('baca-berita/{news_slug}','baca_berita');
    Route::get('daftar-berita-berdasarkan-kategori/{kategori_slug}','daftar_berita_berdasarkan_kategori');
    Route::get('daftar-jurusan','daftar_jurusan');
});
