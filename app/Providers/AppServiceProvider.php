<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(CartService $cartService )
    {
        $category = Category::where('parent_id',0)->get();
        $categoryByParent = Category::where('parent_id','!=',0)->get();
        view()->share('category',$category);
        view()->share('categoryByParent',$categoryByParent);

        $this->cartService = $cartService;
        $products = $this->cartService->getProduct();
        view()->share('products', $products);
        $carts = Session::get('carts');
        view()->share('carts',$carts);

        Paginator::useBootstrap();
    }
}
