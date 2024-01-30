@extends('/layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <link href="{{ asset('CSS/appointment.css') }}" rel="stylesheet">
    <div class="container-fluid p-2">
        <h1>STUDENT LIST</h1>
        <hr style="border: 2px solid black;">
        <div class="d-flex flex-row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ url('/studentdata/computer-studies') }}">
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
                        <a href="{{ url('/studentdata/electrical-engineering') }}">
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
                        <a href="{{ url('/studentdata/civil-engineering') }}">
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
                        <a href="{{ url('/studentdata/arch-engineering') }}">
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
                    <td>Student ID</td>
                    <td>Student Name</td>
                    <td>Department</td>
                    <td>Course</td>
                    <td>Email</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr class="border">
                        <td class="align-middle">{{ $item-> {'studentID'} }}</td>
                        <td>{{ $item-> {'fname'}.' '.$item-> {'lname'} }}</td>
                        <td>{{ $item-> {'cDepartment'} }}</td>
                        <td>{{ $item-> {'course'} }}</td>
                        <td>{{ $item-> {'eMail'} }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

        <script>
            $(document).ready(function () {
                $('#employee_data').DataTable();
            });  
        </script>
@endsection
