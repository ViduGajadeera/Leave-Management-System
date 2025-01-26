<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_leave;
use Illuminate\Support\Facades\Session;

class userPendingController extends Controller
{
    public function index(){

        

        $employeeId = Session::get('id');

        $pending_leaves = user_leave::where('EMPID', $employeeId)->where('status', 'Pending')->get();

        return view('User.pending', compact('pending_leaves'));


    } 

    public function cancel(Request $request){

        $leaveId = $request->input('lid');

       $leave = user_leave::find($leaveId);

       if($leave){
        $leave->status = 'Cancelled';
        $leave->save();

        return redirect()->back()->with('success', 'Leave cancelled successfully');
       }


    }

    public function leaveHistory(){

        $employeeId = Session::get('id');

        $leaves = user_leave::where('EMPID', $employeeId ) // Replace 2 with your EMPID value
        ->where(function ($query) {
            $query->where('status', 'Approved')
                  ->orWhere('status', 'Rejected')
                  ->orWhereNull('status');
        })
        ->get();

        return view('User.history', compact('leaves'));

    }

   
}
