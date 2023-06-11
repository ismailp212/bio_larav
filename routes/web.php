<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\controllerecommerce;
use App\Http\Controllers\controller1;
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

Route::get('/',[controller1::class,'view'])->name('dashboard');

Route::get('/login', function () {
    return view('login');
});

Route::get('/Clients',[controller1::class,'GETDATA'])->name('GETDATA');
Route::post('/Clients',[controller1::class,'GETDATATYPE'])->name('GETDATATYPE');


Route::get('/register',[controller1::class,'register'])->name('register');
Route::post('/register',[controller1::class,'registerD'])->name('registerD');

Route::get('/charts',[controller1::class,'charts'])->name('charts');


Route::get('/updateP',[controller1::class,'updateP'])->name('updateP');
Route::post('/updateP',[controller1::class,'updatePD'])->name('updatePD');

Route::get('/updateS',[controller1::class,'updateS'])->name('updateS');
Route::post('/updateS',[controller1::class,'updateSD'])->name('updateSD');

Route::delete('/delete',[controller1::class,'delete'])->name('delete');


Route::get('/products', [controller1::class,'ADDP'])->name('ADDP');
Route::post('/products', [controller1::class,'ADDPTODB'])->name('ADDPTODB');

Route::get('/services', [controller1::class,'ADDS'])->name('ADDS');
Route::post('/services', [controller1::class,'ADDSTODB'])->name('ADDSTODB');


// route::get('/add_product',function(){
//     return view('add_product');
// })->name('novoprod');
Route::get('/add_product' , [controller1::class,'listProds'])->name('novoprod');
Route::post('/add_product', [controller1::class,'storeProds'])->name('NewProd');

Route::get('/add_collection', [controller1::class, 'listCollec'])->name('novocoll');
Route::post('/add_collection', [controller1::class,'storeCollec'])->name('NewColl');
