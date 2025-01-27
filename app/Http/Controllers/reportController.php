<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\user_leave;
use App\Models\User;


class reportController extends Controller
{
    public function index(){

        return view('admin.reports');
    }

    public function submit(Request $request){

 // Retrieve input values
 $type = $request->input('Rtype');
 $start_date = $request->input('start_date');
 $end_date = $request->input('end_date');

 // Check if type is "ML" and fetch data
 if ($type === 'ML') {
    $leaves = user_leave::select('EMPID', 'EMPNAME', 'DESIGNATION', 'DATEFROM', 'DATETO', 'type', 'REASON', 'status', 'approver')
    ->where('status', 'Approved')
    ->whereBetween('DATEFROM', [$start_date, $end_date])
    ->orderBy('EMPID')  // Add this line to order by EMPID
    ->get();

         // Prepare data for the view
 $data = [
    'leaves' => $leaves,
    'start_date' => $start_date,
    'end_date' => $end_date,
];

// Generate the PDF using a Blade view
$pdf = Pdf::loadView('admin.MLreportPDF', $data);

// Return the PDF for download
return $pdf->download('leave_report.pdf');

 } else if ($type ==='LS'){

   // Fetch employee data and calculate total and remaining leaves for 'LS' type
   $employees = User::select('EMPID', 'name', 'annual_leaves')
   ->get()
   ->map(function ($employee) {
       $approvedLeavesCount = user_leave::where('EMPID', $employee->EMPID)
           ->where('status', 'Approved')
           ->sum('no_of_days');

       $employee->approved_leaves = $approvedLeavesCount; // Approved leaves count
       $employee->remaining_leaves = $employee->annual_leaves - $approvedLeavesCount; // Remaining leaves
       return $employee;
   });

// Prepare data for the view
$data = [
   'employees' => $employees,
];

// Generate and return the PDF for LS
$pdf = Pdf::loadView('admin.LSreportPDF', $data);
return $pdf->download('leave_summary_report.pdf');



 } else {
     return back()->with('error', 'Invalid report type!');
 }

 



    }
}
