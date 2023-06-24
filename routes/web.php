<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PagetypeController;
use App\Http\Controllers\PaymenttypeController;
use App\Http\Controllers\Transaksi1Controller;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\NewsController;
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

});

