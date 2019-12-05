<?php

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

// use Symfony\Component\Routing\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk', 'ProdukController@index');
Route::get('/item/{item}', 'ProdukController@showItem');

Route::get('/register', 'RegisterController@register');
Route::post('/register/proses', 'RegisterController@process');

Route::get('/home', 'dynamicView@home');
Route::get('/home/about', 'dynamicView@about');
Route::get('/home/contact', 'dynamicView@contact');

Route::get('/produk/tambah/', 'ProdukCOntroller@tambahKatalog');
Route::post('/produk/simpan', 'ProdukController@addProducts');
Route::post('/produk/simpan/{id}', 'ProdukController@editProduk_simpan');
Route::get('/produk/edit/{id}', 'ProdukController@editProduct');
Route::get('/produk/hapus/{id}', 'ProdukController@hapusProduk');
Route::get('/produk/terhapus', 'ProdukController@produkTerhapus');
Route::get('/produk/restore/{id}', 'ProdukController@produkRestore');