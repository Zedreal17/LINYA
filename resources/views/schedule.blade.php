@extends('/layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link href="{{ asset('CSS/appointment.css') }}" rel="stylesheet">
    <div class="container-fluid p-2">
        <h1>SCHEDULE</h1>
        <hr style="border: 2px solid black;">
        <div class="d-flex flex-row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/schedule/computer-studies') }}">
                            <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                                <span class="w-100 d-flex flex-row justify-content-center align-items-center">Computer
                                    Studies
                                    Department</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/schedule/electrical-engineering') }}">
                            <button class="form-control pt-3 pb-3 border">
                                <span class="w-100 d-flex flex-row justify-content-center align-items-center">EEC
                                    Engineering Department</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/schedule/civil-engineering') }}">
                            <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                                <span class="w-100 d-flex flex-row justify-content-center align-items-center">Civil
                                    Engineering
                                    Department</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/schedule/arch-engineering') }}">
                            <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                                <span class="w-100 d-flex flex-row justify-content-center align-items-center">Architecture
                                    Department</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border: 2px solid black;">
        <table width="100%">
            <thead class="p-4 border rounded">
                <tr class="border rounded m-2" style="background: #9999995f;">
                    <td>Queue ID</td>
                    <td>Student Name</td>
                    <td>Department</td>
                    <td>Course</td>
                    <td>Appointment Date</td>
                    <td>Time</td>
                    <td>Transaction</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="border">
                        <td class="align-middle">{{ $item->{'appointment_queue'} }}</td>
                        <td>{{ $item->studentinformation->fname . ' ' . $item->studentinformation->lname }}</td>
                        <td>{{ $item->{'student_department'} }}</td>
                        <td>{{ $item->{'student_course'} }}</td>
                        <td>{{ $item->{'date_appointment'} }}</td>
                        <td>{{ $item->{'appointment_time'} }}</td>
                        <td>{{ $item->{'appointment_reasons'} }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#appointment_data').DataTable();
        });
    </script>
@endsection
