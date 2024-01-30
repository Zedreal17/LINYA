@extends('layouts.app')

@section('con1')
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <h2 class="text-center">Now Serving</h2>
                </div>
                {{-- @foreach ($dataqueue as $item) --}}
                @if(isset($dataqueue))
                <div class="card-body " style="background-color: #213855;color:#fff;">
                    <h1 class="text-center serving-number">{{ $dataqueue-> {'appointment_queue'} }}</h1>
                </div>
                <hr style="border: 2px solid black;">
                <table>
                    <tr>
                        <td class="text-center"><i class="bi bi-person-circle"></i></td>
                        <td class="form-control">{{ $dataqueue-> {'student_name'} }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="bi bi-building"></i></td>
                        <td class="form-control">{{ $dataqueue-> {'student_department'} }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="bi bi-calendar3-range"></i></td>
                        <td class="form-control">{{ $dataqueue-> {'student_course'} }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="bi bi-calendar-day-fill"></i></td>
                        <td class="form-control">{{ $dataqueue-> {'date_appointment'} }}</td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="bi bi-exclamation-square-fill"></i></td>
                        <td class="form-control">{{ $dataqueue-> {'appointment_reasons'} }}</td>
                    </tr>
                    @endif
                </table>
                {{-- @endforeach --}}
                <hr style="border: 2px solid black;">
                @if(isset($dataqueue))
                <form action="/editQueue/{{$dataqueue->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="appointment_status" id="" value="DONE" style="border:none;visibility:hidden" >
                    <input type="submit" value="NEXT" class="btn btn-primary form-control">
                </form>
                <form action="/missedQueue/{{$dataqueue->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="appointment_status" id="" value="MISSED" style="border:none;visibility:hidden" >
                    <input type="submit" value="MISSED" class="btn btn-danger form-control">
                </form>
                @endif
            </div>
        </div>
        <div class="col">
            <h2>CURRENT TOKENS</h2>
            <div class="container-fluid border p-2 rounded">
                <hr style="border: 2px solid black; margin:0 !important;">
                {{$currentDateInWords}}
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
                            <td>{{ $item-> {'appointment_queue'} }}</td>
                            <td>{{ $item-> {'student_name'} }}</td>
                            <td>{{ $item-> {'student_department'} }}</td>
                            <td>{{ $item-> {'student_course'} }}</td>
                            <td>{{ $item-> {'date_appointment'} }}</td>
                            <td>{{ $item-> appTime }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                        
            </div>
            <h2 class="mt-3">CANCEL TOKENS</h2>
            <div class="container-fluid border p-2 rounded">
                <hr style="border: 2px solid black; margin:0 !important;">
                {{$currentDateInWords}}
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
                            <td>{{ $item-> {'appointment_queue'} }}</td>
                            <td>{{ $item-> {'student_name'} }}</td>
                            <td>{{ $item-> {'student_department'} }}</td>
                            <td>{{ $item-> {'student_course'} }}</td>
                            <td>{{ $item-> {'date_appointment'} }}</td>
                            <td>{{ $item-> appTime }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>                        
            </div>
            <h2 class="mt-3">MISSED TOKENS</h2>
            <div class="container-fluid border p-2 rounded">
                <hr style="border: 2px solid black; margin:0 !important;">
                {{$currentDateInWords}}
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
                            <td>{{ $item-> {'appointment_queue'} }}</td>
                            <td>{{ $item-> {'student_name'} }}</td>
                            <td>{{ $item-> {'student_department'} }}</td>
                            <td>{{ $item-> {'student_course'} }}</td>
                            <td>{{ $item-> {'date_appointment'} }}</td>
                            <td>{{ $item-> appTime }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>
</div>