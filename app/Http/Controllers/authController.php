<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class authController extends Controller
{
    public function verify(Request $request ){

        $request->validate([
            'Email' =>'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->Email)->first();

        if($user && \Hash::check($request->password, $user->password)){

        $userDetails = User::where('email', $request->Email)->select('userType', 'EMPID', 'name', 'designation')->first();

        if ($userDetails) {
            $userType = $userDetails->userType;
            $EMPID = $userDetails->EMPID;
            $name = $userDetails->name;
            $designation = $userDetails->designation;

            Session::put('id', $EMPID);
            Session::put('role', $userType);
            Session::put('name', $name);
            Session::put('designation', $designation);
            Session::put('email', $request->input('email'));

            switch ($userType) {
                case 'User':
                    return redirect()->route('User-Home');
                    break;

                    case 'Admin':
                        return redirect()->route('admin-home');
                        break;

                    
            }
        
           
        }
      

        

    }
    return redirect()->back()->withErrors([
        'loginError' => 'Invalid email or password. Please try again.',
    ]);
}
}
