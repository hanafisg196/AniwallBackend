<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function doLogin(Request $request)
    {
        $user = $request->all();
        $this->validate($request,[

            "email"    => "required|email",
            "password" => "required"

        ]);
        

        if(auth()->attempt(['email' => $user['email'], 'password' => $user['password']]))
        {
           
           if(auth()->user()->is_admin == 1)
           {
            return redirect()->route('dashboard');
           } else{

            if(auth()->check()) {
                
                return abort(404);
            }

           }
        }
        
         return redirect('/login')->with('error',"Wrong password or email");
   
    }


    public function doLogout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
