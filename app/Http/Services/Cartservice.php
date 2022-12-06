<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
     /**
     * Store a newly created resource in storage.
     * @param  $request
     * @return boolean
     */
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }
        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }
    /**
     * Store a newly created resource in storage.
     * @return string
     */
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];
        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'image')
            ->whereIn('id', $productId)
            ->get();
    }

    /**
    * Update the specified resource in storage.
    *@param $request
     * @return boolean
     */
    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    /**
     * Remove the specified resource from storage.
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::put('carts', $carts);
        return true;
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     *
     * @return boolean
     */
    public function addCart($request)
    {
        try {
            DB::beginTransaction();
            $carts = Session::get('carts');
            if (is_null($carts))
                return false;
            $data = $request->except(['_token','num_product','coupon']);
            $data['status'] = 0;
            $order = Order::create($data);
            $this->infoProductCart($carts, $order->id);
            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(1));
            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param $carts, $order_id
     *
     * @return string
     */
    protected function infoProductCart($carts, $order_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'total','price', 'image','category_id')
            ->whereIn('id', $productId)
            ->get();
        $data = [];
        foreach ($products as $product) {
            $quantity = [
                'name'=> $product->name,
                'image' =>$product->image,
                'price'=> $product->price,
                'category_id'=>$product->category_id
            ];
            $quantity['total'] = $product->total - $carts[$product->id];
            Product::where('id', '=', $productId)->update($quantity);
            $data[] = [
                'order_id' => $order_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price
            ];
        }
        return OrderDetail::insert($data);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @return string
     */
    public function getOrder()
    {
        return Order::orderByDesc('id')->paginate(15);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @return string
     */
    public function getProductForCart($order)
    {
        return $order->orderDetails()->with(['product' => function ($query) {
            $query->select('id', 'name', 'image');
        }])->get();
    }
}
