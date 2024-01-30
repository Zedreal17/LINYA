<style>
    .header
    {
        width: 100%;
        padding: 20px;
        background-color: bisque;
    }
    table
    {
        border-collapse: collapse;
        font-size: 15px;
        text-align: center;
    }
    thead
    {
        padding: 20px;
        height: 100px;
        text-align: left;
        background-color: #24376C;
        color: white;
    }
</style>
<h3>APPOINTMENT MANAGEMENT REPORT</h3>
<hr>
<table width="100%">
    <thead>
        <tr>
            <th style="padding: 10px;">DEPARTMENT</th>
            <th style="padding: 10px;">APPROVED</th>
            <th style="padding: 10px;">REJECTED</th>
            <th style="padding: 10px;">DONE</th>
            <th style="padding: 10px;">APPROVAL</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sumData as $count)
            <tr style="border-bottom: 1px solid lightgray;">
                <td style="text-align: left;">{{ $count->student_department }}</td>
                <td>{{ $count->approved_count }}</td>
                <td>{{ $count->rejected_count }}</td>
                <td>{{ $count->done_count }}</td>
                <td>{{ $count->approval_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>