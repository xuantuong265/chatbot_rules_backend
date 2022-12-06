<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;


class CartController extends Controller
{
    protected $cartService;
    /**
     *
     * @param  App\Http\Services\CartService  $cartService
     *
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * Write code on Method
     *@param Request
     */
     public function addToCart(){
        $products = $this->cartService->getProduct();
        return view('user.cart.cart'
        ,[
            'products' => $products,
            'carts' => Session::get('carts')
        ]
    );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect()->route('show.cart');
    }
     /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $products = $this->cartService->getProduct();
        return view('user.cart.list'
        ,[
            'products' => $products,
            'carts' => Session::get('carts')
        ]
    );
    }
     /**
       * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $this->cartService->update($request);
        return redirect()->route('show.cart');
    }
     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $this->cartService->remove($id);
        return redirect()->route('show.cart');
    }
  /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);
        Alert::success(' Order Success', 'Success Message');
        return redirect()->back();

    }
}
