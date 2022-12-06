<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('parent_id',0)->get();
        $categoryByParent = Category::where('parent_id','!=',0)->get();
       return view('user.main',compact('category','categoryByParent'));
    }
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = Product::paginate(8);
        $sliders = Banner::limit(3)->get();
       return view('user.home',compact('data','sliders'));
    }
      /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showdetail($id)
    {
        $productDetail = Product::where('id', $id)->first();
        return view('user.product.detail',compact('productDetail'));
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function showbycategory($id)
   {
        $productsbyCategory = Product::where('category_id',$id)->paginate(8);
        $namecategory = Category::where('id',$id)->get();
        return view('user.product.productcategory',compact('productsbyCategory','namecategory'));
   }
}
