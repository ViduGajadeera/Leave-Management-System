
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
        <h3>Hi! {{ session('name') }} </h3>
        <h3 class="card-title">Welcome to LMS - ANJV 2.0</h3>
      </div>
    </div>

    
          <div class="card">
            <div class="card-body">
             
            
            <table class="table table-striped table-hover">
              <thead><i>Pending Leaves</i></thead>
              <hr>
  
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Employee Name</th>
              <th scope="col">Date From</th>
              <th scope="col">Date To</th>
              <th scope="col">No. of Days</th>
              <th scope="col">Status</th>
              <th scope="col" colspan='2'><center>Action</center></th>
            </tr>
          

          </thead>
          <tbody>
            @foreach($pendingLeaves as $leave)
            <tr>
              <td>{{$leave->LEAVEID}}</td>
              <td>{{$leave->EMPNAME}}</td>
              <td>{{$leave->DATEFROM}}</td>
              <td>{{$leave->DATETO}}</td>
              <td>{{$leave->no_of_days}}</td>
              <td><b>{{$leave->status}}</b></td>
              <form action="{{route('leave-approve')}}" method="POST">
                @csrf
                <input type="hidden" name="cancel" value="cancel">
                <input type="hidden" name="lid" value="{{$leave->LEAVEID}}">
              <td><center><button type="submit" class="btn btn-primary">Approve</button></center> </td>
              </form>

              <form action="{{route('leave-reject')}}" method="POST">
                @csrf
                <input type="hidden" name="cancel" value="cancel">
                <input type="hidden" name="lid" value="{{$leave->LEAVEID}}">
              <td><center><button type="submit" class="btn btn-danger">Reject</button></center></td>
              </form>
            </tr>
            @endforeach
          </tbody>
          <tbody>

          

        </tbody>
</table>
           
            </div>
          </div>
        



</div>
</div>




       

     
@endsection
