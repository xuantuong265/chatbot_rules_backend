<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $banners = Banner::paginate(10);
        return view('admin.banner.show',compact('banners'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner=$request->except('_token','image');
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData['image'] = Storage::putFile('public/product/images', $image);
            $banner['image'] = $imageData['image'];
        }
        Banner::create($banner);
        Alert::success('Add Banner Success', 'Success Message');
        return redirect()->route('banner.index');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banners = Banner::findOrFail($id);
        return view('admin.banner.edit', compact('banners'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $id = $request->id;
        $banner = $request->except(['_token','image']);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageData['image'] = Storage::putFile('public/product/images', $image);
            $banner['image'] = $imageData['image'];
        }
        Banner::where('id', '=', $id)->update($banner);
        Alert::success('Edit Banner Success', 'Success Message');
        return redirect()->route('banner.index');
    }
      /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id','=',$id )->delete();
        Alert::success('Delete Banner Success', 'Success Message');
        return redirect()->back()->with('success', 'User delete sucessfully');
    }
}
