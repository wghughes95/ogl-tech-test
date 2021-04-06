<?php

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
Route::get('/javascript', function () {
    return view('javascript');
});

Route::get('/{sort?}', function ($sort = null) {
    $prods = json_decode(file_get_contents('https://testapi.oglsoftware.co.uk/products'));

    $products = collect($prods->data);

    if ($sort != null)
        $sortedProducts = $products->sortBy($sort);
    else
        $sortedProducts = $products;

    return view('welcome', compact('sortedProducts'));
});


