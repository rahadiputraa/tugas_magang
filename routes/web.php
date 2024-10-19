<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SuratController as AdminSuratController;
use App\Http\Controllers\Admin\SuratCreateController as AdminSuratCreateController;
use App\Http\Controllers\Admin\SuratUpdateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserCreateController;
use App\Http\Controllers\Admin\UserUpdateController;
use App\Http\Controllers\User\ProfileController as ProfileProfileController;
use App\Http\Controllers\Public\LoginController;
use App\Http\Controllers\Public\LogOutController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\SuratController;
use App\Http\Controllers\User\SuratCreateController;
use App\Http\Controllers\User\SuratUpdateController as UserSuratUpdateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect("/auth/login");
});

// auth
Route::name('auth.')
    ->prefix('/auth')
    ->group(function() {   

    // login
    Route::controller(LoginController::class)
        ->name('login.')
        ->prefix('/login')
        ->group(function() {
            // auth.login
            Route::get('', 'index')->name('index');
            Route::post('verify', 'verify')->name('verify');
    });

    // auth.logout
    Route::post('logout', [LogOutController::class, 'logout'])->name('logout');
}); 

// Admin 
Route::name('admin.')
    ->prefix('/admin')
    ->middleware('checkLoginAdmin')
    ->group(function() {

        Route::get('/dashboard',[DashboardController::class,'index'])->name('index');

        Route::name('user.')
            ->prefix('/user')
            ->group(function() {
                // admin.user
                Route::get('',[UserController::class,'index'])->name('index');
                Route::get('/create',[UserCreateController::class,'index'])->name('create');
                Route::post('/create/save',[UserCreateController::class,'save'])->name('create.save');
                Route::get('/update/{id}',[UserUpdateController::class,'index'])->name('update');
                Route::post('/update/save',[UserUpdateController::class,'save'])->name('update.save');
        });

        Route::name('profile.')
            ->prefix('/profile')
            ->controller(ProfileController::class)
            ->group(function() {
                // admin.profile
                Route::get('','index')->name('index');
                Route::post('/update/save', 'update_save')->name('update.save');
        });

        Route::name('surat.')
            ->prefix('/surat')
            ->group(function() {
                // user.surat
                Route::get('',[AdminSuratController::class,'index'])->name('index');
                Route::get('/create',[AdminSuratCreateController::class,'index'])->name('create');
                Route::post('/create/save',[AdminSuratCreateController::class,'save'])->name('create.save');
                Route::get('/update/{id}',[SuratUpdateController::class,'index'])->name('update');
                Route::post('/update/save',[SuratUpdateController::class,'save'])->name('update.save');
        });

        Route::name('profile.')
            ->prefix('/profile')
            ->controller(ProfileController::class)
            ->group(function() {
                // user.profile
                Route::get('','index')->name('index');
                Route::post('/update/save', 'update_save')->name('update.save');
        });
    });

// User 
Route::name('user.')
    ->prefix('/user')
    ->middleware('checkLoginUser')
    ->group(function() {

        Route::get('/dashboard',[UserDashboardController::class,'index'])->name('index');

        Route::name('surat.')
            ->prefix('/surat')
            ->group(function() {
                // user.surat
                Route::get('',[SuratController::class,'index'])->name('index');
                Route::get('/create',[SuratCreateController::class,'index'])->name('create');
                Route::post('/create/save',[SuratCreateController::class,'save'])->name('create.save');
                Route::get('/update/{id}',[UserSuratUpdateController::class,'index'])->name('update');
                Route::post('/update/save',[UserSuratUpdateController::class,'save'])->name('update.save');
        });

        Route::name('profile.')
            ->prefix('/profile')
            ->controller(ProfileProfileController::class)
            ->group(function() {
                // user.profile
                Route::get('','index')->name('index');
                Route::post('/update/save', 'update_save')->name('update.save');
        });
    });