<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_leave;

class AdminHomeController extends Controller
{
   public function pendingLoad(){


    $pendingLeaves = user_leave::where('status', 'Pending')->get();
    return view('admin.home', compact('pendingLeaves'));


   }
}
