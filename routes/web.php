<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::middleware(['auth'])->get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['middleware' => ['auth']], function () {
        Route::resource('roles', '\App\Http\Controllers\RoleController');
        Route::resource('permissions', '\App\Http\Controllers\PermissionController');
        Route::resource('users', '\App\Http\Controllers\UserController');
        Route::post('persons/search', [\App\Http\Controllers\PersonController::class, 'search']);
        Route::resource('persons', '\App\Http\Controllers\PersonController');
        Route::resource('houses', '\App\Http\Controllers\HouseController');
        Route::resource('customers', '\App\Http\Controllers\CustomerController');

        Route::post('upload/house/{house_id}', [App\Http\Controllers\HouseController::class, 'uploadphoto']);
        Route::post('uploadplanimetria/house/{house_id}', [App\Http\Controllers\HouseController::class, 'uploadphoto_planimetria']);
        Route::get('photodelete/{house_photo_id}', [App\Http\Controllers\HouseController::class, 'deletePhoto']);
    });

    require __DIR__.'/auth.php';

    Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
