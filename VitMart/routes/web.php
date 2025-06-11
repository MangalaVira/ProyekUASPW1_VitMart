<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CekLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);

Route::get("/profil", function(){
    return view("profil");
});

Route::get("/makanan", function(){
    return view("makanan");
});

Route::get("/minuman", function(){
    return view("minuman");
});

Route::get("/obat", function(){
    return view("obat");
});

Route::get('/', function () {
    return view('home');
});

//Authentication
Route::get("/login", [AuthController::class, 'login'])->name('login');
Route::post("/login", [AuthController::class, 'do_login']);
Route::get("/register", [AuthController::class, 'register']);
Route::post("/register", [AuthController::class, 'do_register']);
Route::get("/logout", [AuthController::class, 'logout']);

Route::group(['middleware' => ['auth']], function(){
    Route::get("/admin", [AdminController::class, 'index'])->middleware(CekLogin::class.':admin');
    Route::get("/user", [UserController::class, 'index'])->middleware(CekLogin::class.':user');
    Route::prefix('admin')->group(function (){
        //Route::get("/", [AdminController::class, 'index']);
    });


    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin', [AdminController::class, 'index']);
    });

    Route::middleware(['auth', 'role:user'])->group(function () {
        Route::get('/user', [UserController::class, 'index']);
    });

});
