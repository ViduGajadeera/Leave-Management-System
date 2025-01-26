<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\user_leave;
use App\Models\User;

class UserHomeController extends Controller
{
   public function index(){


      $employeeId = Session::get('id');

      $totalLeaves = User::where('EMPID',$employeeId)->select('annual_leaves')->first();

      $approvedLeaves = user_leave::where('EMPID', $employeeId)
    ->where('status', 'Approved')
    ->sum('no_of_days');

    $pendingLeaves = user_leave::where('EMPID', $employeeId)
    ->where('status', 'Pending')
    ->sum('no_of_days');

    

    $remaining = $totalLeaves->annual_leaves - $approvedLeaves;



    return view('User.home',compact('totalLeaves','approvedLeaves','pendingLeaves','remaining'));

   }


   
}
