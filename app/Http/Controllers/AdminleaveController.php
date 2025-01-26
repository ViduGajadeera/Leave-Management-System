<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_leave;
use Carbon\Carbon;

class AdminleaveController extends Controller
{
    public function indexadmin(){
        return view('admin.request');
    }

    public function submitadmin(Request $request){


        /* $id = $request->input('empID');
      $name=$request->input('name');
      $dateF = $request->input('dateF');
      $dateT=$request->input('dateT');
      $reason=$request->input('reason');*/

      $request->validate([
          'empID' => 'required',
          'name' => 'required',
          'Designation' => 'required',
          'dateF' => 'required|date',
          'dateT' => 'required|date',
          'leaveType'=>'required',
          'reason' => 'required',
      ]);



      $type=$request->input('leaveType');
     // dd($type);

      // Parse the dates using Carbon
$dateFromParsed = Carbon::parse($request->input('dateF'),);
$dateToParsed = Carbon::parse($request->input('dateT'),);


if ($type == 'Full Day') {
    // Calculate the difference in days for Full Day
    $dateDifference = $dateFromParsed->diffInDays($dateToParsed) + 1;
  //  dd($dateDifference);
} else if ($type == 'Half Day') {
    // Calculate the difference in days for Half Day
    $dateDifference = ($dateFromParsed->diffInDays($dateToParsed) + 1) * 0.5;
   // dd($dateDifference);
}


      //dd($request->input('empID'));

      user_leave::create([
          'EMPID' => $request->input('empID'),
          'EMPNAME' => $request->input('name'),
          'DESIGNATION'  => $request->input('Designation'),
          'DATEFROM'  => $request->input('dateF'),
          'DATETO' => $request->input('dateT'),
          'no_of_days'=>$dateDifference,
            'type'=>$type,
            'REASON'  => $request->input('reason'),
          'status'  => "Pending",
          'approver'  => "null"
      ]);

      return redirect('request-leave-admin')->with('success', 'Leave request submitted successfully!');

  }
}
