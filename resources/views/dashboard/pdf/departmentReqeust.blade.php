<style>
    .header {
        text-align: left;
        width: 100%;
        padding: 20px;
        background-color: bisque;
    }

    table {
        border-collapse: collapse;
        font-size: 15px;
        width: 100%; /* Add this to ensure the table takes the full width */
    }

    thead {
        height: 100px;
        text-align: left;
        background-color: #24376C;
        color: white;
        padding: 10px; /* Adjust the padding as needed */
    }

    tbody tr {
        border-bottom: 1px solid lightgray;
    }

    tbody td {
        padding: 10px; /* Adjust the padding as needed */
    }
</style>

<h3>APPOINTMENT MANAGEMENT REPORT</h3>
<hr>
<table>
    <thead>
        <tr>
            <th style="padding: 5px;">DEPARTMENT</th>
            <th style="padding: 5px;">APPOINTMENT</th>
            <th style="padding: 5px;">COURSE</th>
            <th style="padding: 5px;">DATE</th>
            <th style="padding: 5px;">QUEUE</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($departmentData as $count)
            <tr style="border-bottom: 1px solid lightgray;">
                <td>{{ $count->student_department }}</td>
                <td>{{ $count->appointment_reasons }}</td>
                <td>{{ $count->student_course }}</td>
                <td>{{ $count->date_appointment }}</td>
                <td>{{ $count->appointment_queue }}</td>

            </tr>
        @endforeach
    </tbody>
</table>    