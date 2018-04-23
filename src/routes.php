<?php
Route::prefix('client')->group(function () {
    Route::prefix('products')->group(function () {
        Route::get('in-stock', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController@productsInStock')
            ->name('products.in-stock');
        Route::get('out-of-stock', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController@productsOutOfStock')
            ->name('products.out-of-stock');
        Route::get('amount-over-five', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController@productsAmountOverFive')
            ->name('products.amount-over-five');
    });

    Route::resource('products', 'MrPiatek\\BlueClient\\Http\\Controllers\\ProductsClientIndexController')->except([
        'index', 'show'
    ]);
});