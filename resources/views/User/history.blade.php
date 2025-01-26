
@extends('layout.User-app')

@section('title', 'Pending Leaves')

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

      @if($leaves !=null)

     <table class="table table-striped-columns">
  
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Employee Name</th>
              <th scope="col">Date From</th>
              <th scope="col">Date To</th>
              <th scope="col">Leave Type</th>
              <th scope="col">Status</th>
              
            </tr>
          

          </thead>
          <tbody>
            @foreach($leaves as $leave)
            <tr>
              <td>{{$leave->LEAVEID}}</td>
              <td>{{$leave->EMPNAME}}</td>
              <td>{{$leave->DATEFROM}}</td>
              <td>{{$leave->DATETO}}</td>
              <td>{{$leave->type}}</td>
              <td><b>{{$leave->status}}</b></td>
             
            </tr>
            @endforeach
          </tbody>
          <tbody>

          

        </tbody>
</table>
@endif
    


      </div>
    </div>





  
          </div>
        </div>

       

     
@endsection
