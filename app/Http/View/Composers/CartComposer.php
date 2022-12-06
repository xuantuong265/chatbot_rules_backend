<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CartComposer
{
    protected $users;

    /**
     * @param  Illuminate\View\View $view
     */
    public function compose(View $view)
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'image')
            ->whereIn('id', $productId)
            ->get();
        $view->with('products', $products);
    }
}
