<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showproduct($id)
    {
        $products = Product::where('category_id', $id)->paginate(5);
        return view('admin.category.showproduct', compact('data'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.product.show', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::get();
        return view('admin.product.add', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     *    * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showadddetail($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.product.add_detail', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storedetail(Request $request)
    {
        $description = $request->description;
        $attribute = $request->attribute;
        $value = $request->value;
        $id = $request->id;
        $productDetail = ProductDetail::where('product_id', $id)->first();
        if ($productDetail !== null) {
            $create = ProductDetail::where('product_id', $id)->update([
                'description' => $description,
                'attribute' => $attribute,
                'value' => $value,
            ]);
            if ($create) {
                return redirect()->route('product.show');
            }
        } else {
            $create = ProductDetail::create([
                'product_id' => $id,
                'description' => $description,
                'attribute' => $attribute,
                'value' => $value,
            ]);
            if ($create) {
                return redirect()->route('product.show');
            }
        }
        return false;
    }
     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdetail($id)
    {
        $product = Product::where('id', $id)->get();
        $prouductDetail = ProductDetail::where('product_id', $id)->get();
        return view('admin.product.showdetail', compact('product', 'prouductDetail'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $product = $request->except(['image','_token']);
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageData['image'] = Storage::putFile('public/product/images', $image);
                $product['image'] = $imageData['image'];
            }
            Product::create($product);
            Alert::success('Add Product Success', 'Success Message');
            return redirect()->route('product.show');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Category::get();
        return view('admin.product.edit', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $products = $request->except(['image','_token']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData['image'] = Storage::putFile('public/product/images', $image);
            $products['image'] = $imageData['image'];
        }
        Product::where('id', '=', $id)->update($products);
        Alert::success('Edit Product Success', 'Success Message');
        return redirect()->route('product.show');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Product::where('id', '=', $id)->delete();
        Alert::success('Delete Product Success', 'Success Message');
        return redirect()->back()->with('success', 'User delete sucessfully');
    }
}
