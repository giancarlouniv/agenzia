<?php

    use Illuminate\Support\Facades\Route;

    Route::middleware('auth')->get('/', '\App\Http\Controllers\HomeController@index');
    Route::middleware('auth')->get('/dashboard', '\App\Http\Controllers\HomeController@index')->name('dashboard');
    Route::middleware('auth')->get('/home', '\App\Http\Controllers\HomeController@index')->name('home');

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('roles', '\App\Http\Controllers\RoleController');
        Route::resource('permissions', '\App\Http\Controllers\PermissionController');
        Route::resource('users', '\App\Http\Controllers\UserController');
        Route::post('person/search', [\App\Http\Controllers\PersonController::class, 'search']);
        Route::resource('persons', '\App\Http\Controllers\PersonController');
        Route::resource('houses', '\App\Http\Controllers\HouseController');
        Route::resource('customers', '\App\Http\Controllers\CustomerController');
        Route::resource('richieste', '\App\Http\Controllers\RichiesteController');

        Route::post('upload/house/{house_id}', [App\Http\Controllers\HouseController::class, 'uploadphoto']);
        Route::post('uploadplanimetria/house/{house_id}', [App\Http\Controllers\HouseController::class, 'uploadphoto_planimetria']);
        Route::get('photodelete/{house_photo_id}', [App\Http\Controllers\HouseController::class, 'deletePhoto']);
    });

    require __DIR__.'/auth.php';

    Auth::routes();

