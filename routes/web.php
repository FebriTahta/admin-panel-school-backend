<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagetypeController;
use App\Http\Controllers\PaymenttypeController;
use App\Http\Controllers\Transaksi1Controller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\KesiswaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InformasiPPDBController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\FloatMenuController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'CheckRole:admin,super_admin']], function () {
    
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/admin-dashboard','admin_dashboard');
    });

    Route::controller(Transaksi1Controller::class)->group(function(){
        Route::post('/transaksi1','transaksi1');
        Route::get('/payment-transaksi1/{transaksi1_uuid}','payment_transaksi1');
    });

    Route::controller(JurusanController::class)->group(function(){
        Route::get('/admin-daftar-jurusan','admin_daftar_jurusan');
        Route::get('/admin-create-jurusan','admin_create_jurusan');
        Route::post('/new-jurusan','new_jurusan');
        Route::get('/admin-edit-jurusan/{id}','admin_edit_jurusan');
        Route::post('/remove-jurusan','remove_jurusan');
    });

    Route::controller(GuruController::class)->group(function(){
        Route::get('/admin-daftar-guru','admin_daftar_guru');
        Route::get('/admin-create-guru','admin_create_guru');
        Route::get('/admin-edit-guru/{id}','admin_edit_guru');
        Route::post('/new-guru','new_guru');
        Route::post('/remove-guru','remove_guru');
    });

    Route::controller(KategoriController::class)->group(function(){
        Route::get('/admin-kategori','admin_kategori');
        Route::post('/new-kategori','new_kategori');
        Route::post('/remove-kategori','remove_kategori');
    });

    Route::controller(NewsController::class)->group(function(){
        Route::get('/admin-daftar-berita','admin_daftar_berita');
        Route::get('/admin-create-berita','admin_create_berita');
        Route::post('/new-berita','new_berita');
        Route::get('/admin-edit-berita/{id}','edit_berita');
        Route::post('/remove-berita','remove_berita');
        // HIGHLIGHT
        Route::get('/admin-set-banner/{id}','set_banner');
        // PRESTASI
        Route::get('/admin-prestasi','admin_prestasi');
        Route::get('/admin-create-prestasi','admin_create_prestasi');
        // PROGRAM UNGGULAN
        Route::get('/admin-program-unggulan','admin_program_unggulan');
        Route::get('/admin-create-program-unggulan','admin_create_program_unggulan');
    });

    Route::controller(PaymenttypeController::class)->group(function(){
        Route::get('/admin-payment-type','admin_payment_type');
        Route::get('/admin-new-payment-type','new_payment_type');
        Route::post('/admin-store-payment-type','store_payment_type');
        Route::get('/admin-edit-payment-type/{id}','edit_payment_type');
        Route::post('/admin-remove-payment-type','remove_payment_type');
        Route::get('/form-payment/{id}','form_payment');

        ROute::get('/admin-payment-setting','payment_setting');
    });

    Route::controller(MenuController::class)->group(function(){
        Route::get('/admin-menu-control','admin_menu_control')->name('admin.menu.control');
        Route::post('/store-main-menu','store_main_menu');
        Route::get('/check-status-menu/{mainmenu_id}','cek_status_menu');
        Route::post('/remove-main-menu','remove_main_menu');
    });

    Route::controller(PagetypeController::class)->group(function(){
        Route::get('/admin-page-type','admin_page_type')->name('admin.page.type');
        Route::post('/store-menu-type','store_menu_type');
    });

    Route::controller(BannerController::class)->group(function(){
        Route::get('/admin-banner','admin_banner');
        Route::get('/admin-create-banner','admin_create_banner');
        Route::get('/admin-edit-banner/{id}','admin_edit_banner');
        Route::post('/new-banner','new_banner');
        Route::post('/remove-banner','remove_banner');
    });

    Route::controller(ProfileController::class)->group(function(){
        Route::get('/admin-profile','admin_profile');
        Route::post('/submit-profile','submit_profile');
    });

    Route::controller(KesiswaanController::class)->group(function(){
        Route::get('/admin-kesiswaan','admin_kesiswaan');
        Route::get('/admin-edit-kesiswaan/{id}','admin_edit_kesiswaan');
        Route::get('/admin-create-kesiswaan','admin_create_kesiswaan');
        Route::post('/new-kesiswaan','new_kesiswaan');
        Route::post('/remove-kesiswaan','remove_kesiswaan');
        Route::post('/remove-dokumen-kesiswaan','remove_dokumen_kesiswaan');
    });

    Route::controller(InformasiPPDBController::class)->group(function(){
        Route::get('/admin-informasi-ppdb','informasi_ppdb');
        Route::get('/admin-create-infoppdb','create_infoppdb');
        Route::post('/new-infoppdb','new_infoppdb');
        Route::get('/admin-edit-infoppdb/{id}','edit_infoppdb');
        Route::post('/remove-infoppdb','hapus_infoppdb');
    });

    Route::controller(AlumniController::class)->group(function(){
        Route::get('/admin-alumni','admin_alumni');
        Route::get('/admin-create-alumni','create_alumni');
        Route::post('/new-alumni','new_alumni');
        Route::get('/admin-edit-alumni/{id}','edit_alumni');
        Route::get('/admin-set-alumni/{id}','set_alumni');
        Route::post('/remove-alumni','hapus_alumni');
    });

    Route::controller(ArsipController::class)->group(function(){
        Route::get('/admin-arsip','admin_arsip');
        Route::get('/admin-create-arsip','create_arsip');
        Route::post('/admin-new-arsip','new_arsip');
        Route::get('/admin-edit-arsip/{id}','edit_arsip');
        Route::post('/admin-remove-arsip','remove_arsip');

        Route::post('/admin-new-kategoribuku','new_kategoribuku');
        Route::get('/admin-pilih-kategoribuku/{id}','pilih_kategoribuku');
        Route::post('/admin-update-kategoribuku','update_kategoribuku');
        Route::post('/admin-hapus-kategoribuku','hapus_kategoribuku');
    });

    Route::controller(BrosurController::class)->group(function(){
        Route::get('/admin-brosur','admin_brosur');
        Route::get('/admin-create-brosur','create_brosur');
        Route::get('/admin-edit-brosur/{id}','edit_brosur');
        Route::post('/admin-new-brosur','new_brosur');
        Route::get('/admin-hapus-brosur','hapus_brosur');
        Route::get('/set-brosur/{id}','set_brosur');
    });

    Route::controller(FloatMenuController::class)->group(function(){
        Route::get('/admin-floatmenu','admin_floatmenu');
        Route::get('/admin-create-floatmenu','create_floatmenu');
        Route::post('/admin-new-floatmenu','new_floatmenu');
        Route::post('/admin-remove-floatmenu','remove_floatmenu');
        Route::get('/admin-edit-floatmenu/{id}','edit_floatmenu');
        Route::post('/admin-update-sosmed','update_sosmed');
    });
});

