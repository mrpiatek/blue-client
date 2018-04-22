<?php
Route::prefix('client')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('in-stock', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController@productsInStock');
        Route::get('out-of-stock', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController@productsOutOfStock');
        Route::get('amount-over-five', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController@productsAmountOverFive');
    });

    Route::resource('products', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController')->except([
        'index', 'show'
    ]);
});