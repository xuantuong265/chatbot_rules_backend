<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\ResetPasswordRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class PasswordResetController extends Controller
{
    /**
     * Store a newly created resource in storage.
     * *
     * @return \Illuminate\Http\Response
     */

    public function showForgetPasswordForm()
    {
       return view('login.forgetPassword');
    }
   /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);

          $token = Str::random(64);

            DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });

          return back()->with('message', 'We have e-mailed your password reset link!');
      }
         /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
      public function showResetPasswordForm($token) {

        return view('login.forgetPasswordLink', ['token' => $token]);
     }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function submitResetPasswordForm(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required'
         ]);

         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email,
                               'token' => $request->token
                             ])
                             ->first();

         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }

         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

                DB::table('password_resets')->where(['email'=> $request->email])->delete();
         return redirect('/admin/login')->with('message', 'We have e-mailed your password reset link!');
     }


}
