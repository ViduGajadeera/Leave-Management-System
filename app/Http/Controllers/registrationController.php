<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class registrationController extends Controller
{
   public function registration(Request $request){

   /* $request->validate([
        'EMPID' => 'required|numeric|unique:users,EMPID',
        'EMPNAME' => 'required|string|max:255',
        'contact' => 'required|digits:10',
        'designation' => 'required|string|max:255',
        'user_type' => 'required|in:Admin,User',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:4|confirmed', // Password confirmation rule
    ], [
        // Custom error messages
        'EMPID.required' => 'Employee ID is required.',
        'EMPID.numeric' => 'Employee ID must be a valid number.',
        'EMPID.unique' => 'Employee ID already exists.',
        'EMPNAME.required' => 'Employee Name is required.',
        'contact.required' => 'Contact Number is required.',
        'contact.digits' => 'Contact Number must be exactly 10 digits.',
        'designation.required' => 'Designation is required.',
        'user_type.required' => 'Please select a User Type.',
        'user_type.in' => 'Invalid User Type selected.',
        'email.required' => 'Email is required.',
        'email.email' => 'Enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 8 characters.',
        'password.confirmed' => 'Password confirmation does not match.',
    ]);*/

    User::create([
        'EMPID' => $request->input('EMPID'),
        'name' => $request->input('EMPNAME'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')), // Hash the password
        'contact' => $request->input('contact'),
        'annual_leaves' => 21,
        'designation' => $request->input('designation'),
        'userType' => $request->input('user_type'),
       
       
    ]);

    return back()->with('success', 'User registered successfully!');

   }
}
