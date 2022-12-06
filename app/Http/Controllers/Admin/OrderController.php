<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Order;

class OrderController extends Controller
{

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cart.contact', [
            'orders' => $this->cart->getOrder()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $carts = $this->cart->getProductForCart($order);
        return view('admin.cart.detail', [
            'order' => $order,
            'carts' => $carts
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'User delete sucessfully');
    }
    /**
     * view status order
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $order = Order::where('id',$id)->first();
       return view('admin.cart.status',compact('order'));
    }
       /**
     * update status order
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $data = $request->except('_token');
        Order::where('id',$id)->update($data);
       return redirect()->route('show.orders');
    }


}
