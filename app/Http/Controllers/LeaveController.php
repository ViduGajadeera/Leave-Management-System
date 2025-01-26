<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\user_leave;

class LeaveController extends Controller
{
    public function accept(Request $request){
        $employeeName = Session::get('name');

        $leaveId = $request->input('lid');

        $leave = user_leave::find($leaveId);

        if($leave){
         $leave->status = 'Approved';
         $leave->approver = $employeeName;
         $leave->save();
 
         return redirect()->back()->with('success', 'Leave Approved successfully');
        }


    }


    public function reject(Request $request){

        $employeeName = Session::get('name');

        $leaveId = $request->input('lid');

        $leave = user_leave::find($leaveId);

        if($leave){
         $leave->status = 'Rejected';
         $leave->approver = $employeeName;
         $leave->save();
 
         return redirect()->back()->with('success', 'Leave Rejected !');
        }

    }
}
