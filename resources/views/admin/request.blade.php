
@extends('layout.admin-app')

@section('title', 'Request Leave')

@section('styles')
<style>
  .all-cards {
    margin-top: 100px;
   margin-left: auto;
  }



  
</style>
@endsection





@section('content')

@if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif


<div class="container">
  <div class="all-cards">
    <div class="card">
      <div class="card-body">



    <form class="row g-3" action="{{ route('submit-leave-admin') }}" method="POST">
        @csrf
        <input type="hidden" name="empID" value="{{session('id')}}">
        <input type="hidden" name="name" value="{{session('name')}}">
        <input type="hidden" name="Designation" value="{{session('designation')}}">
        <h1>Leave Form</h1>
  <div class="col-md-6">
    <label  class="form-label"><h5>Employee ID</h5> </label>
    <input type="text" class="form-control" id="empID"  placeholder="{{ session('id') }}" readonly>
  </div>
  <div class="col-md-6">
    <label  class="form-label"><h5>Employee Name</h5></label>
    <input type="text" class="form-control" id="EmpName"  placeholder="{{ session('name') }}" readonly>
  </div>

  <div class="col-md-12">
    <label  class="form-label"><h5>Designation</h5></label>
    <input type="text" class="form-control" id="Designation"  placeholder="{{ session('designation') }}" readonly>
  </div>

  <div class="col-6">
    <label  class="form-label"><h5>Date From</h5></label>
    <input type="Date" class="form-control" id="dateFrom" name="dateF">
  </div>
  <div class="col-6">
    <label  class="form-label"><h5>Date To</h5></label>
    <input type="Date" class="form-control" id="dateTo" name="dateT">
  </div>


  <div class="col-6">
    <div>
  <label class="form-label"><h5>Leave Type</h5></label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" id="fullDay" name="leaveType" value="Full Day" required>
    <label class="form-check-label" for="fullDay">Full Day</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="radio" id="halfDay" name="leaveType" value="Half Day" required>
    <label class="form-check-label" for="halfDay">Half Day</label>
  </div>
</div>




  <div class="col-md-12">
    <label  class="form-label"><h5>Reason</h5></label>
    <textarea class="form-control" name="reason" id="Reason" name="reason"></textarea>
  </div>
  
 
  </div>
  <div class="col-6" style="margin-bottom: 20px; margin-left: 550px;">
    <button type="submit" class="btn btn-primary">Request</button>
    <button type="reset" class="btn btn-danger">Cancel</button>
  </div>
  
</form>


      </div>
    </div>





  
          </div>
        </div>

       

     
@endsection
