@extends('layouts.app')

@section('content')
    <link href="{{ asset('CSS/home.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="d-flex flex-row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('department', ['department' => 'Computer Studies Department']) }}">
                            <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                                <img src="/img/logo/linya-logo-mini.png" alt="" class="img-button align-items-start">
                                <span class="w-100 d-flex flex-row justify-content-end align-items-center">Computer Studies
                                    Department</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('department', ['department' => 'Electrical, Electronics, and Computer Engineering (EECE) Department']) }}">
                        <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                            <img src="/img/logo/linya-logo-mini.png" alt="" class="img-button align-items-start">
                            <span class="w-100 d-flex flex-row justify-content-end align-items-center">Electrical,
                                Electronics, and Computer Dept</span>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('department', ['department' => 'Civil Engineering Department']) }}">
                        <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                            <img src="/img/logo/linya-logo-mini.png" alt="" class="img-button align-items-start">
                            <span class="w-100 d-flex flex-row justify-content-end align-items-center">Civil Engineering
                                Department</span>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('department', ['department' => 'Architecture Department']) }}">
                        <button class="form-control pt-3 pb-3 border d-flex flex-row justify-content-start">
                            <img src="/img/logo/linya-logo-mini.png" alt="" class="img-button align-items-start">
                            <span class="w-100 d-flex flex-row justify-content-end align-items-center">Architecture
                                Department</span>
                        </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <hr style="border: 2px solid black;">

        <div class="container-fluid">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <h2 class="text-center">Now Serving</h2>
                        </div>
                        {{-- @foreach ($dataqueue as $item) --}}
                        @if (isset($dataqueue))
                            <div class="card-body " style="background-color: #213855;color:#fff;">
                                <h1 class="text-center serving-number">{{ $dataqueue->{'appointment_queue'} }}</h1>
                            </div>
                            <hr style="border: 2px solid black;">
                            <table>
                                <tr>
                                    <td class="text-center"><i class="bi bi-person-circle"></i></td>
                                    <td class="form-control">{{ $dataqueue->studentinformation->fname . ' ' . $dataqueue->studentinformation->lname}}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="bi bi-building"></i></td>
                                    <td class="form-control">{{ $dataqueue->{'student_department'} }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="bi bi-calendar3-range"></i></td>
                                    <td class="form-control">{{ $dataqueue->{'student_course'} }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="bi bi-calendar-day-fill"></i></td>
                                    <td class="form-control">{{ $dataqueue->{'date_appointment'} }}</td>
                                </tr>
                                <tr>
                                    <td class="text-center"><i class="bi bi-exclamation-square-fill"></i></td>
                                    <td class="form-control">{{ $dataqueue->{'appointment_reasons'} }}</td>
                                </tr>
                        @endif
                        </table>
                        {{-- @endforeach --}}
                        <hr style="border: 2px solid black;">
                        @if (isset($dataqueue))
                            <form action="/editQueue/{{ $dataqueue->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="appointment_status" id="" value="DONE"
                                    style="border:none;visibility:hidden">
                                <input type="submit" value="NEXT" class="btn btn-primary form-control">
                            </form>


                            <form action="/missedQueue/{{ $dataqueue->id }}" method="POST" id="missedForm">
    @csrf
    @method('PUT')
    <input type="text" name="appointment_status" value="MISSED" style="border:none;visibility:hidden">
    <input type="submit" value="MISSED" class="btn btn-danger form-control" id="missedButton">
    <p id="countdown"></p>
</form>
                        @endif
                    </div>
                </div>
                <div class="col">
                    <h2>CURRENT TOKENS</h2>
                    <div class="container-fluid border p-2 rounded">
                        <hr style="border: 2px solid black; margin:0 !important;">
                        {{ $currentDateInWords }}
                        <hr style="border: 2px solid black; margin:0 !important;">
                        <table width="100%">
                            <thead class="p-4 border rounded">
                                <tr class="border rounded m-2" style="background: #9999995f;">
                                    <td>Queue ID</td>
                                    <td>Student Name</td>
                                    <td>Department</td>
                                    <td>Course</td>
                                    <td>Appointment Date</td>
                                    <td>Time</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->{'appointment_queue'} }}</td>
                                        <td>{{ $item->studentinformation->fname . ' ' . $item->studentinformation->lname }}</td>
                                        <td>{{ $item->{'student_department'} }}</td>
                                        <td>{{ $item->{'student_course'} }}</td>
                                        <td>{{ $item->{'date_appointment'} }}</td>
                                        <td>{{ $item->appTime }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h2 class="mt-3">CANCEL TOKENS</h2>
                    <div class="container-fluid border p-2 rounded">
                        <hr style="border: 2px solid black; margin:0 !important;">
                        {{ $currentDateInWords }}
                        <hr style="border: 2px solid black; margin:0 !important;">
                        <table width="100%">
                            <thead class="p-4 border rounded">
                                <tr class="border rounded m-2" style="background: #9999995f;">
                                    <td>Queue ID</td>
                                    <td>Student Name</td>
                                    <td>Department</td>
                                    <td>Course</td>
                                    <td>Appointment Date</td>
                                    <td>Time</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataCancel as $item)
                                    <tr>
                                        <td>{{ $item->{'appointment_queue'} }}</td>
                                        <td>{{ $item->studentinformation->fname . ' ' . $item->studentinformation->lname }}</td>
                                        <td>{{ $item->{'student_department'} }}</td>
                                        <td>{{ $item->{'student_course'} }}</td>
                                        <td>{{ $item->{'date_appointment'} }}</td>
                                        <td>{{ $item->appTime }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <h2 class="mt-3">MISSED TOKENS</h2>
                    <div class="container-fluid border p-2 rounded">
                        <hr style="border: 2px solid black; margin:0 !important;">
                        {{ $currentDateInWords }}
                        <hr style="border: 2px solid black; margin:0 !important;">
                        <table width="100%">
                            <thead class="p-4 border rounded">
                                <tr class="border rounded m-2" style="background: #9999995f;">
                                    <td>Queue ID</td>
                                    <td>Student Name</td>
                                    <td>Department</td>
                                    <td>Course</td>
                                    <td>Appointment Date</td>
                                    <td>Time</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataMissed as $item)
                                    <tr>
                                        <td>{{ $item->{'appointment_queue'} }}</td>
                                        <td>{{ $item->studentinformation->fname . ' ' . $item->studentinformation->lname }}</td>
                                        <td>{{ $item->{'student_department'} }}</td>
                                        <td>{{ $item->{'student_course'} }}</td>
                                        <td>{{ $item->{'date_appointment'} }}</td>
                                        <td>{{ $item->appTime }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Disable the button on page load
            document.getElementById('missedButton').disabled = true;
    
            // Enable the button after 1 minute
            setTimeout(function () {
                document.getElementById('missedButton').disabled = false;
            }, 60000); // 60000 milliseconds = 1 minute
        });
        document.addEventListener('DOMContentLoaded', function () {
            // Set the duration in seconds (1 minute = 60 seconds)
            const duration = 60;
            let remainingTime = duration;
    
            // Function to update the countdown and enable the button
            function updateCountdown() {
                document.getElementById('countdown').innerHTML = `Timer Before Missed Appointments ${remainingTime} seconds`;
    
                if (remainingTime <= 0) {
                    document.getElementById('missedButton').disabled = false;
                    document.getElementById('countdown').innerHTML = '---------------------';
                } else {
                    remainingTime--;
                    setTimeout(updateCountdown, 1000); // Update every 1 second
                }
            }
    
            // Initial update
            updateCountdown();
        });
    </script>
@endsection
