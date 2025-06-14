<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Keranjang;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot() 
    {
    //untuk menampilkan banyak produk di ikon keranjang yang conect ke header
        View::composer('*', function ($view) {
            $jumlahJenisProduk = 0;

            if (Auth::check()) {
                $jumlahJenisProduk = Keranjang::where('user_id', Auth::id())
                    ->distinct('product_id')
                    ->count('product_id');
            }

            $view->with('jumlahJenisProduk', $jumlahJenisProduk);
        });
    }

}
