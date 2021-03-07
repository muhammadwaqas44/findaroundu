<?php

Route::middleware(['auth', 'verified', 'CheckUser'])->prefix('user')->name('user.')->group(function () {
    Route::namespace('Inv')->group(function () {
        Route::get('my-orders','OrderController@index')->name('my-orders');
        Route::get('order-management','OrderController@orderManagement')->name('order-management');
        Route::get('order-detail/{id}','OrderController@orderDetail')->name('order-detail');
        Route::post('order-status-update','OrderController@orderStatusUpdate')->name('order-status-update');
    });
});

Route::middleware(['auth', 'CheckAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Inv')->group(function () {
        Route::get('all-orders','OrderController@adminAllOrders')->name('all-orders');
    });
});

// --------------------------------------  product routes ---------------------------------------------- //

Route::middleware(['auth', 'verified', 'CheckUser'])->group(function () {

    Route::get('user/all-products', 'Inv\ProductController@viewProducts')->name('user.all-products');
    Route::get('user/create-product', 'Inv\ProductController@createProduct')->name('user.create-product');
    Route::get('user/get-sub-category/{id}', 'Inv\ProductController@getSubCategory')->name('user.sub-category');
    Route::post('user/insert-product', 'Inv\ProductController@insertProduct')->name('user.insert_product');
    Route::get('user/product-detail/{id}', 'Inv\ProductController@productDetail')->name('user.product.detail');

    Route::post('user/inv-product-review', 'Inv\ProductController@saveReview')->name('user.give-inv-product-review');

    Route::get('user/edit-product/{id}', 'Inv\ProductController@editProduct')->name('user.edit-product');

    Route::post('user/update-product', 'Inv\ProductController@updateProduct')->name('user.update-product');
    Route::get('user/delete-product/{id}', 'Inv\ProductController@deleteProduct')->name('user.delete-product');

});

    Route::get('product-listing','Shopping\ShoppingController@product_listing')->name('product-listing');
