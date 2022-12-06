<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->limit(8)->get();
            $html = view('user.search.search',compact('products'))->render();
            return response()->json([
                'status' => true,
                'html' => $html,
                'message' => 'Coupon code applied successfully.',
            ]);
        }else{
            redirect()->back;
        }
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        if ($request->ajax()) {
            $products = Product::wherebetween('price',[0,$request->filter])->limit(8)->get();
            $html = view('user.search.filter',compact('products'))->render();
            return response()->json([
                'status' => true,
                'html' => $html,
                'message' => 'Coupon code applied successfully.',
            ]);
        }else{
            redirect()->back;
        }
    }

}
