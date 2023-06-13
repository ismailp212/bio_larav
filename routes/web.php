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


Route::group(['middleware' => 'auth'], function () {



    Route::get('/',[controller1::class,'view'])->name('dashboard');


    Route::post('/logout',[controller1::class,'logout'] )->name('logout');


    Route::get('/Clients',[controller1::class,'GETDATA'])->name('GETDATA');
    Route::post('/Clients',[controller1::class,'GETDATATYPE'])->name('GETDATATYPE');

    Route::get('/reservation',[controller1::class,'reservation'])->name('reservation');
    Route::post('/reservation',[controller1::class,'reservation_data'])->name('reservation_data');

    Route::get('/commendes',[controller1::class,'commendes'])->name('commendes');
    Route::post('/commendes',[controller1::class,'commendes_data'])->name('commendes_data');
    
    Route::get('/charts',[controller1::class,'charts'])->name('charts');


    Route::get('/updateP',[controller1::class,'updateP'])->name('updateP');
    Route::post('/updateP',[controller1::class,'updatePD'])->name('updatePD');

    Route::get('/updateS',[controller1::class,'updateS'])->name('updateS');
    Route::post('/updateS',[controller1::class,'updateSD'])->name('updateSD');

    Route::delete('/delete',[controller1::class,'delete'])->name('delete');

    Route::delete('/delete_coll',[controller1::class,'delete_coll'])->name('delete_coll');

    Route::delete('/delete_prod',[controller1::class,'delete_prod'])->name('delete_prod');


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


    Route::get('/update_coll', [controller1::class, 'update_coll'])->name('update_coll');
    Route::post('/update_coll_data', [controller1::class,'update_coll_data'])->name('update_coll_data');
});



route::middleware('guest')->group(function(){

    Route::get('/login', function () {
    return view('login');
    })->name('login');


    Route::post('/login',[controller1::class,'login'] )->name('loginD');


    Route::get('/register',[controller1::class,'register'])->name('register');
    Route::post('/register',[controller1::class,'registerD'])->name('registerD');

});





