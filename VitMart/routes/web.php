<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\PoinMemberController;
use App\Http\Middleware\CekLogin;
use Illuminate\Support\Facades\Route;


Route::get('/', [AuthController::class, 'login']);

Route::get("/profil", function(){
    return view("profil");
});

Route::get("/admin", function(){
    return view("admin");
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
    Route::get("/User", [UserController::class, 'index'])->middleware(CekLogin::class.':User');

    Route::prefix('User')->group(function (){
        Route::get("/User", [UserController::class, 'index']);
    });

    Route::prefix('admin')->group(function (){
        Route::get("/admin", [AdminController::class, 'index']);
    });

    Route::get("/keranjang", function(){
        return view("keranjang");
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
        Route::post('/keranjang', [KeranjangController::class, 'store'])->name('keranjang.store');
        Route::delete('/keranjang/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

        Route::patch('/keranjang/{id}/tambah', [KeranjangController::class, 'tambah'])->name('keranjang.tambah');
        Route::patch('/keranjang/{id}/kurangi', [KeranjangController::class, 'kurangi'])->name('keranjang.kurangi');
    });

    Route::get('/member.create', [MemberController::class, 'create'])->name('member.create');
    Route::get('/member/poin', [MemberController::class, 'poin'])->name('member.add_points');
    Route::get('/member/add-points', [MemberController::class, 'addPointsForm'])->name('member.add_points_form');
    Route::post('/member/add-points', [MemberController::class, 'addPointsSubmit'])->name('member.add_points_submit');

    Route::get('/member/create', [MemberController::class, 'create'])->name('member.create');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/success', [MemberController::class, 'success'])->name('member.success');
    Route::get('/member', [MemberController::class, 'index'])->name('member.indexmember');
    Route::get('/member/poin', [MemberController::class, 'poin'])->name('member.add_points');
    Route::get('/member/add-points', [MemberController::class, 'addPointsForm'])->name('member.add_points_form');
    Route::post('/member/add-points', [MemberController::class, 'addPointsSubmit'])->name('member.add_points_submit');

    Route::group(['middleware' => [CekLogin::class.':admin']], function(){
        Route::get('/products', [ProductController::class, 'index'])->name('products.index');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products', [ProductController::class, 'store'])->name('products.store');
        Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    });

    Route::resource('products', ProductController::class);

    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    Route::post('/checkout', [TransaksiController::class, 'checkout'])->name('checkout');

    Route::get('/member/poin', [MemberController::class, 'daftarPoin'])->name('member.poin');
    Route::get('/member/add-points', [MemberController::class, 'showAddPointsForm'])->name('member.add_points');
    Route::post('/member/add-points', [MemberController::class, 'submitAddPoints'])->name('member.add_points_submit');

});
