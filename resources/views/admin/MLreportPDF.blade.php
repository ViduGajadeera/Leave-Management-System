<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Leave Report</h1>
    <p>Report Period: {{ $start_date }} to {{ $end_date }}</p>

    <table>
        <thead>
            <tr>
                <th>Emplyee ID</th>
                <th>Name</th>
                <th>Designation</th>
                <th>From</th>
                <th>To</th>
                <th>Leave Type</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Approved By</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->EMPID }}</td>
                <td>{{ $leave->EMPNAME }}</td>
                <td>{{ $leave->DESIGNATION }}</td>
                <td>{{ $leave->DATEFROM }}</td>
                <td>{{ $leave->DATETO }}</td>
                <td>{{ $leave->type }}</td>
                <td>{{ $leave->REASON }}</td>
                <td>{{ $leave->status }}</td>
                <td>{{ $leave->approver }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
