<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Leave By Mobile</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
        body {
            background-color: #EEEEEE;
        }

        .form-container {
            margin-top: 20px;
        }

        .btn-container {
            text-align: center;
        }
    </style>
</head>
<body>

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

@if(session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error!',
        text: '{{ session('error') }}',
        confirmButtonColor: '#fc2003',
        confirmButtonText: 'OK'
    });
</script>
@endif

<div class="container form-container">
    <div class="card">
        <div class="card-body">
            <form class="row g-3" action="{{route('submit-Mobile-leave')}}" method="POST">
                @csrf
                
                <h1 class="text-center">Leave Form</h1>

                <div class="col-12 mb-3">
                    <label class="form-label"><h5>Mobile Number</h5></label>
                    <input type="tel" class="form-control" id="mobile" name="mobile">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label"><h5>Date From</h5></label>
                    <input type="date" class="form-control" id="dateFrom" name="dateF">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label"><h5>Date To</h5></label>
                    <input type="date" class="form-control" id="dateTo" name="dateT">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label"><h5>Leave Type</h5></label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="fullDay" name="leaveType" value="Full Day" required>
                        <label class="form-check-label" for="fullDay">Full Day</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" id="halfDay" name="leaveType" value="Half Day" required>
                        <label class="form-check-label" for="halfDay">Half Day</label>
                    </div>
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label"><h5>Reason</h5></label>
                    <textarea class="form-control" name="reason" id="Reason"></textarea>
                </div>

                <div class="col-12 btn-container mb-3">
                    <button type="submit" class="btn btn-primary me-2">Request</button>
                    <button type="reset" class="btn btn-danger">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
