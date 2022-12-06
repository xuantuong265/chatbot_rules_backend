<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles','permissions')->get();
      return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        User::create($data);
        return redirect()->route('user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.edit', compact('users'));
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function role($id)
    {
        $user = User::find($id);
        $role = Role::orderBY('id','DESC')->get();
        $permission = Permission::orderBY('id','DESC')->get();
        $all_column_roles = $user->roles->first();
        return view('admin.user.role',compact('user','role','permission','all_column_roles'));
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permission($id)
    {
        $user = User::find($id);
        $permission = Permission::orderBY('id','DESC')->get();
        $name_role = $user->roles->first()->name;
        $get_permission_via_role = $user->getPermissionsViaRoles();
        return view('admin.user.permission',compact('user','permission','name_role','get_permission_via_role'));
    }
   /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insert_role(Request $request, $id)
    {
      $data = $request->all();
      $user = User::find($id);
      $user->syncRoles($data['role']);
      return redirect()->route('user.index')->with('success', 'successfully');
    }
     /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function insert_permission(Request $request, $id)
    {
      $data = $request->all();
      $user = User::find($id);
      $role_id = $user->roles->first()->id;
      $role = Role::find($role_id);
      $role->syncPermissions($data['permission']);
      $user->syncPermissions($data['permission']);
      return redirect()->route('user.index')->with('success', 'successfully');
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
        User::where('id', $id)->update($data);
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return redirect()->route('user.index');
    }
}
