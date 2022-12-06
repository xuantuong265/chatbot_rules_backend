<?php

namespace App\Http\Controllers;

use App\Models\User;
// use Illuminate\Contracts\Session\Session;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login.login');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $email_login = $request->email;
            return view('admin.main',compact('email_login'));
        }
        return redirect('/login')->with('error', 'Oppes! You have entered invalid credentials');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(){
        Auth::logout();
        return redirect()->route('show.login');
    }

}
