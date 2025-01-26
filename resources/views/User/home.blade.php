
@extends('layout.User-app')

@section('title', 'Request Leave')

@section('styles')
<style>
  .all-cards {
    margin-top: 40px;
   margin-left: auto;
  }

  .second-card {
   max-width:50%;
   margin-left: 25%;
  }
  .card{
    margin-top: 80px;
    
  }

  
</style>
@endsection





@section('content')
<div class="container">
  <div class="all-cards">
    <div class="card">
      <div class="card-body">
        <h3>Hi! {{ session('name') }} </h3>
       <h3 class="card-title">Welcome to LMS - ANJV 2.0</h3>
      </div>
    </div>

    <div class="second-card">
      <div class="row">
        <!-- Left Side Card -->
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Total Leaves</h5>
              <hr />
              
                <h3 class="card-text"><center>{{$totalLeaves->annual_leaves}} </center></h3>
           
            </div>
          </div>
        </div>



          <!-- Left Side Card -->
          <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Approved Leaves</h5>
              <hr />
              
                <h3 class="card-text"><center>{{$approvedLeaves}}</center> </h3>
           
            </div>
          </div>
        </div>


          <!-- Left Side Card -->
          <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pending Leaves</h5>
              <hr />
              
                <h3 class="card-text"><center>{{$pendingLeaves}}</center></h3>
           
            </div>
          </div>
        </div>


          <!-- Left Side Card -->
          <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Remaining Leaves</h5>
              <hr />
              
                <h3 class="card-text"><center>{{$remaining}}</center></h3>
           
            </div>
          </div>
        </div>
</div>
</div>




       

     
@endsection
