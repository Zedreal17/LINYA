@extends('layouts.app')

@section('content')
    <link href="{{ asset('CSS/dashboard.css') }}" rel="stylesheet">
    <div class="container-fluid p-2">
        <h1>DASHBOARD</h1>
        <hr style="border: 2px solid black;">
        <div class="d-flex flex-row">
            <!-- Display counts for different appointment statuses -->
            @foreach ($appointments as $status => $count)
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <button class="form-control pt-3 pb-3 d-flex flex-row justify-content-start">
                    @php
                        $statusImage = '';
                        switch(strtolower($status)) {
                            case 'missed':
                                $statusImage = '/img/logo/linya-logo-mini.png'; // Change the path as per your image location
                                break;
                            case 'cancel':
                                $statusImage = '/img/logo/cancel.png';
                                break;
                            case 'pending':
                                $statusImage = '/img/logo/pending.png';
                                break;
                            case 'complete':
                                $statusImage = '/img/logo/complete.png';
                                break;
                            default:
                                $statusImage = '/img/logo/default.png'; // Change the default image path if needed
                        }
                    @endphp

                    <img src="{{ $statusImage }}" alt="" class="img-button align-items-start">
                    <span class="w-100 d-flex flex-column justify-content-end align-items-end">
                        <span style="font-size:50px; margin-bottom:-20px;">{{ $count }}</span>
                        <span>{{ ucfirst(strtolower($status)) }} TOKENS</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
@endforeach

        </div>

        <hr style="border: 2px solid black;">
        <h1>USER ANALYTICS</h1>
        <div class="container-fluid d-flex">
            <div class="conatiner-fluid w-100 p-4">
                <div class="d-flex justify-content-between">
                    <h4>User Engagement</h4>
                    <a href="/dashboard/pdf/department-count" target="_blank"><i class="bi bi-printer-fill"></i></a>

                </div>
                <div id="department-requests-chart" style="height: 400px;"></div>
            </div>
            <div class="p-3">

            </div>
            <div class="conatiner-fluid w-100 p-4">
                <div class="d-flex justify-content-between">
                    <h4>Reason For Queue</h4>
                    <a href="/dashboard/pdf/departmentRequest" target="_blank"><i class="bi bi-printer-fill"></i></a>

                </div>
                <div id="word-counts-chart" style="height: 400px;"></div>
            </div>
            
        </div>
        <div class="container-fluid mt-5">
            <div class="container-fluid p-3">
                <div class="d-flex justify-content-between">
                    <h4>TOTAL SUMMARY</h4>
                    <a href="/dashboard/pdf/summarydep" target="_blank"><i class="bi bi-printer-fill"></i></a>

                </div>
                <table width="100%">
                    <thead class="p-4 border rounded">
                        <tr class="border rounded m-2" style="background: #9999995f;">
                            <td>Department</td>
                            <td>Approved</td>
                            <td>Rejected</td>
                            <td>Done</td>
                            <td>APPROVAL</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            <tr class="border">
                                <td class="align-middle">{{ $item->{'student_department'} }}</td>
                                <td>{{ $item->{'approved_count'} }}</td>
                                <td>{{ $item->{'rejected_count'} }}</td>
                                <td>{{ $item->{'done_count'} }}</td>
                                <td>{{ $item->{'approval_count'} }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>




        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

        <script>
            $(document).ready(function() {
                // Use the data passed from the controller to generate the department requests chart
                Morris.Bar({
                    element: 'department-requests-chart',
                    data: {!! json_encode($departmentCounts) !!},
                    xkey: 'student_department',
                    ykeys: ['count'],
                    labels: ['Count'],
                    barColors: ['#3498db'],
                });

                // Use the data passed from the controller to generate the word counts chart
                Morris.Bar({
                    element: 'word-counts-chart',
                    data: {!! json_encode($wordData) !!},
                    xkey: 'word',
                    ykeys: ['count'],
                    labels: ['Count'],
                    barColors: ['#3498db'],
                });
            });
        </script>
    </div>
@endsection
