<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_leave;
use App\Models\User;
use Carbon\Carbon;

class MobileLeaveController extends Controller
{
    public function index(){

        return view('Mobile');

    }

    public function request(Request $request){

        $validatedData = $request->validate([
            'mobile' => [
                'required', 
                'regex:/^0[0-9]{9}$/', // Validates 10-digit mobile numbers starting with 0
            ],
            'dateF' => 'required|date', // Ensure 'Date From' is not after 'Date To'
            'dateT' => 'required|date',
            'leaveType' => 'required|in:Full Day,Half Day', // Ensure it matches predefined values
            'reason' => 'required|string|max:255', // Ensure a reason is provided
        ]);


        $type=$request->input('leaveType');

        // Parse the dates using Carbon
$dateFromParsed = Carbon::parse($request->input('dateF'),);
$dateToParsed = Carbon::parse($request->input('dateT'),);


if( $type==='Full Day'){

// Calculate the difference in days
$dateDifference = $dateFromParsed->diffInDays($dateToParsed);
$dateDifference+=1;
} else if ($type==='Half Day'){

    $dateDifference = $dateFromParsed->diffInDays($dateToParsed);
    $dateDifference+=1;
    $dateDifference= ($dateDifference*0.5);

}

$contact = $request->input('mobile');

$employeeData = User::where('contact',$contact)->select('EMPID','name','designation')->first();

if (!$employeeData) {
    return redirect('Mobile-Leave')->with('error', 'No employee found with provided contact number.');
}else{


user_leave::create([
    'EMPID' => $employeeData->EMPID,
    'EMPNAME' => $employeeData->name,
    'DESIGNATION'  => $employeeData->designation,
    'DATEFROM'  => $request->input('dateF'),
    'DATETO' => $request->input('dateT'),
    'no_of_days'=>$dateDifference,
    'type'=>$type,
    'REASON'  => $request->input('reason'),
    'status'  => "Pending",
    'approver'  => "null"
]);


return redirect('Mobile-Leave')->with('success', 'Leave request submitted successfully!');
}

    }
}
