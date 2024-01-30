@extends('layouts.app')

@section('content')
    <!-- Your custom CSS file -->
    <link href="{{ asset('CSS/appointment.css') }}" rel="stylesheet">

    <div class="container-fluid p-2">
        <h1>APPOINTMENTS</h1>
        <hr style="border: 2px solid black;">

        <div class="d-flex flex-row">
            @foreach ($appointments as $status => $count)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <button class="form-control pt-3 pb-3 d-flex flex-row justify-content-start">
                                <img src="/img/logo/linya-logo-mini.png" alt="" class="img-button align-items-start">
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

        <div class="container-fluid">
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
                        <td>Contact Number</td>
                        <td width="20%">Action</td>
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
                            <td>{{ $item->studentinformation->pNumber }}</td>
                            <td class="d-flex" style="width: 250px;">
                                <form action="/updateAppointment/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary" style="margin-right: 10px;">
                                        <i class="bi bi-check-all"></i> APPROVED
                                    </button>
                                </form>
                                <form action="/rejectAppointment/{{ $item->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger" style="margin-right: 10px;">
                                        <i class="bi bi-x-octagon-fill"></i> REJECT
                                    </button>
                                </form>
                                @if ($item->{'appointment_reasons'} === 'CONSULTATION')
                                    <form action="/facultyApprovalView/{{ $item->id }}" method="get">
                                        <button>
                                            <i class="bi bi-arrow-right-circle"></i> Faculty Approval
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
