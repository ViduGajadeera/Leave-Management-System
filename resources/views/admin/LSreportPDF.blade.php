<!DOCTYPE html>
<html>
<head>
    <title>Leave Summary Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Leave Summary Report</h1>
    <table>
        <thead>
            <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Total Leaves</th>
                <th>Leaves Obtained</th>
                <th>Remaining Leaves</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->EMPID }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->annual_leaves }}</td>
                    <td>{{ $employee->approved_leaves }}</td>
                    <td>{{ $employee->remaining_leaves }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
