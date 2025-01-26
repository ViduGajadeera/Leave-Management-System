
@extends('layout.admin-app')

@section('title', 'Home')

@section('styles')
<style>
  .all-cards {
    margin-top: 40px;
   margin-left: auto;
  }

  .table-card {
   width:1300px;
   margin-left: 10%;
  }
  .card{
    margin-top: 80px;
    
  }
  .card-body {
    max-height: 500px; /* Set the maximum height for the card */
    overflow-y: auto; /* Enable vertical scrolling */
  }

  
</style>
@endsection





@section('content')

<div class="container">
  <div class="all-cards">
  <div class="card">
  
  <div class="card-body">
  
    <h5 class="card-title">Generate Reports</h5>
   
    
  </div>
</div>


<div class="second-card">
<div class="row">
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
       
      @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif



      <div class="container mt-2">
    <h5 class="mb-4">Leave Reports</h5>
    <hr />
    <form action="{{route('leave-report')}}" method="POST" target="_blank">
        @csrf
        <!-- Row for Start and End Date -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="start_date" class="form-label">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control" >
            </div>
            <div class="col-md-6">
                <label for="end_date" class="form-label">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control" >
            </div>
        </div>

        <!-- Row for Report Type -->
        <div class="row mb-3">
            <div class="col-md-12">
                <label for="Rtype" class="form-label">Report Type</label>
                <select name="Rtype" id="Rtype" class="form-select">
                    <option value="">Select</option>
                    <option value="ML">Monthly Leave Report</option>
                    <option value="LS">Leave Summary Report</option>
                   

                </select>
            </div>
        </div>

        <!-- Row for Generate Report Button -->
        <div class="row">
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">Generate Report</button>
            </div>
        </div>
    </form>
</div>





        
      </div>
    </div>
  </div>
</div>



</div>
</div>    

     
@endsection
