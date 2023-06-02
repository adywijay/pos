<?php

use Illuminate\Support\Facades\Route;
#use App\Http\Controllers\TestingController;
use App\Http\Controllers\Homepage_Controller;
use App\Http\Controllers\Guest_Controller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [Homepage_Controller::class, 'index'])->name('beranda');
Route::prefix('guest')->group(

    function () {

        Route::get('/', [Guest_Controller::class, 'index'])->name('beranda_guest');
        Route::get('/getproduct/all', [Guest_Controller::class, 'getProductDefault'])->name('product_data');
        Route::get('/crud_product', [Guest_Controller::class, 'addProductReq'])->name('view_products');
        Route::get('/getby_product/{id}', [Guest_Controller::class, 'getIdProduct']);
        Route::post('/search_product', [Guest_Controller::class, 'searchProduct'])->name('search_products');
        Route::post('/crud_product/add', [Guest_Controller::class, 'insertProducts'])->name('add_products');
        Route::put('/edit_product', [Guest_Controller::class, 'actionUpdateProduct'])->name('update_products');

        Route::post('/tes123', [Guest_Controller::class, 'tes'])->name('tes_ae');
        Route::get('/tesApi', [Guest_Controller::class, 'tesGetApi']);
    }
);
