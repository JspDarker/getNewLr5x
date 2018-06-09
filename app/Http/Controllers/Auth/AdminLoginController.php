<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin',['except'=> ['logout']] );
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request,[
            'email'=> 'required|email'
            ,'password' => 'required|min:6'
        ]);

        // Attempt to log then user in
        #Auth::guard('admin')->attempt($credentials,$remember); //TODO connect auth config

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password],$request->remember)) {
            //if successful, the redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));

        }

        //if unsuccessful, then redirect back then login with the form data

        return redirect()->back()->withInput($request->only('email','remember'));
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout(); // TODO: link to #222  && #333

        #$request->session()->invalidate(); // can delete

        return redirect('/');
    }

}
