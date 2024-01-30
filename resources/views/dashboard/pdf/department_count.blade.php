<style>
    .header
    {
        width: 100%;
        padding: 20px;
    }
    table
    {
        border-collapse: collapse;
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
<h3>USER ENGAGEMENT REPORT</h3>
<hr>
<table width="100%">
    <thead>
        <tr>
            <th style="padding: 10px;">Department</th>
            <th style="padding: 10px;">Count</th>
        </tr>
    </thead>
    <tbody>
        @foreach($departmentCounts as $count)
            <tr style="border-bottom: 1px solid lightgray;">
                <td>{{ $count->student_department }}</td>
                <td>{{ $count->count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>