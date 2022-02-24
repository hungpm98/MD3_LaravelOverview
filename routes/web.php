<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('home/{name?}',function ($name = null){
   if ($name){
       echo "Welcome bố"." ".$name;
   }else{
       echo "Not"." "."bố";
   }
});
Route::get('login',function (){
    return view(('login'));
});
Route::post('login',function (Request $request ){
   if ($request->username == "admin" && $request->password == "4231"){
       return view('login-success');
   } else{
       return view('login-fail');
   }
});
Route::get('product',function (){
    return view('product');
});
Route::post('product',function (Request $request){
    $productDescription = $request->description; // mô tả
    $price = $request->price; // giá
    $discountPrice = $request->percent; // phần trăm
    $discountPercent = $price * $discountPrice * 0.01; // số chiết khấu
    $discountAmount = $price - $discountPercent; // sau khi chiết khấu

    return view('Calculated', compact(["productDescription","price","discountAmount","discountPercent","discountPrice"]));

});
