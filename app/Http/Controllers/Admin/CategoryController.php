<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $categories = Category::get();
        dd($categories);
        return view('admin.category.show', compact('categories'));
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request) {
        $category = Category::find($request->id);
        $category->status = $request->active;
        $category->save();
        return response()->json(['success' => 'Status Changed Successfully']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_id',0)->get();
        return view('admin.category.add', compact('category'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $request->except('_token');
        Category::create($category);
        Alert::success('Add Category Success', 'Success Message');
        return redirect()->route('category.show');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::where('id', '=', $id)->first();
        $categoryParent = Category::where('parent_id',0)->get();
        return view('admin.category.edit', compact('categories','categoryParent'));
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
        $data = $request->except('_token');
        Category::where('id','=',$id)->update($data);
        Alert::success('Edit Category Success', 'Success Message');
        return redirect()->route('category.show');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id','=',$id )->delete();
        Alert::success('Delete Category Success', 'Success Message');
        return redirect()->back()->with('success', 'User delete sucessfully');
    }
}
