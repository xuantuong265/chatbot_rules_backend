<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        if ($request->ajax()) {
            $products = Product::where('name', 'LIKE', '%' . $request->search . '%')->limit(5)->get();
            $html = view('admin.product.search',compact('products'))->render();
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
     public function searchcategory(Request $request)
    {
                if (isset($request->query) && !is_null($request->query)) {
                    $search_text =  $request->input('query');
                    $data = Category::where('name', 'LIKE', '%' . $search_text . '%')->paginate(2);
                    $data->appends($request->all());
                    return view('admin.category.search', compact('data'));
                } else {
                    return view('admin.category.show');
                }
    }

}
