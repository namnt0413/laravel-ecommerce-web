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

//server
Route::prefix('admin')->group(function () {

    Route::get('/', [
        'as' => 'admin.login',
        'uses' => 'AdminController@loginAdmin'
    ]);
    Route::post('/', [
        'as' => 'admin.post-login',
        'uses' => 'AdminController@postLoginAdmin'
    ]);

    Route::get('/logout', [
        'as' => 'admin.logout',
        'uses' => 'AdminController@logout'
    ]);


    Route::prefix('categories')->group(function () {
         Route::get('/', [
        'as' => 'categories.index',
            'uses' => 'AdminCategoryController@index'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'AdminCategoryController@create'
        ]);

        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'AdminCategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'AdminCategoryController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'AdminCategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'AdminCategoryController@delete'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'AdminMenuController@index'
        ]);

        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'AdminMenuController@create'
        ]);

        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'AdminMenuController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'AdminMenuController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'AdminMenuController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'AdminMenuController@delete'
        ]);

    });
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);
        Route::get('/search', [
            'as' => 'product.search',
            'uses' => 'AdminProductController@search'
        ]);

    });
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'AdminSliderController@index'
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'AdminSliderController@create'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'AdminSliderController@store'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'AdminSliderController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'AdminSliderController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'AdminSliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'AdminSliderController@delete'
        ]);
    });
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'AdminSettingController@index'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'AdminSettingController@create'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'AdminSettingController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'AdminSettingController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'AdminSettingController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'AdminSettingController@delete'
        ]);

    });
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'AdminUserController@index'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'AdminUserController@create'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'AdminUserController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'AdminUserController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'AdminUserController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'AdminUserController@delete'
        ]);

    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


// client
Route::get('/', 'HomeController@index');
Route::get('add-to-cart/{id}', 'CartController@addToCart')->name('addToCart') ;
Route::get('show-cart', 'CartController@showCart')->name('showCart') ;
Route::get('update-cart', 'CartController@updateCart')->name('updateCart') ;
Route::get('delete-cart', 'CartController@deleteCart')->name('deleteCart') ;

Route::get('product-modal/{id}', 'HomeController@productModal')->name('productModal') ;

Route::prefix('user')->group(function () {
    Route::get('login', 'UserController@login')->name('login') ;
    Route::get('logout', 'UserController@logout')->name('logout') ;
    Route::get('signup', 'UserController@signup')->name('signup') ;
    Route::post('postLogin', 'UserController@postLogin')->name('postLogin') ;
});

Route::prefix('home')->group(function () {
    Route::get('/', [
   'as' => 'home.index',
       'uses' => 'HomeController@index'
   ]);
});

Route::prefix('product')->group(function () {
    Route::get('/', [
   'as' => 'product.index',
       'uses' => 'ProductController@index'
   ]);
   Route::get('/category/{slug}/{id}', [
    'as' => 'product.category',
        'uses' => 'ProductController@category'
    ]);
    Route::get('/{id}', [
        'as' => 'product.detail',
            'uses' => 'ProductController@detail'
        ]);
});

Route::prefix('cart')->group(function () {
    Route::get('/', [
   'as' => 'cart.index',
       'uses' => 'CartController@index'
   ]);
});

Route::prefix('checkput')->group(function () {
    Route::get('/', [
   'as' => 'checkout.index',
       'uses' => 'CheckoutController@index'
   ]);
});
