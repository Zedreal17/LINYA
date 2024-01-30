@extends('layouts.app')

@section('content')
    <div class="card-body container">
        <h5 class="card-title p-2" style="background-color: lightgray;">Special title treatment</h5>
        @if ($appointment)
            
                Queue ID:
                <input type="text" class="form-control mb-2" value="{{ $appointment->appointment_queue }}">
                Name:
                <input type="text" class="form-control mb-2"
                    value="{{ $appointment->studentinformation->fname }} {{ $appointment->studentinformation->lname }}">
                Department:
                <input type="text" class="form-control mb-2" value="{{ $appointment->student_department }}">
                Date:
                <input type="text" class="form-control mb-2" value="{{ $appointment->date_appointment }}">
                Reason:
                <input type="text" class="form-control mb-2" value="{{ $appointment->natureCounselling }}">
                Faculty Involved:
                <input type="text" class="form-control mb-2" value="{{ $appointment->teacherInvovled }}">
                Subject:
                <input type="text" class="form-control mb-2" value="{{ $appointment->subjectInvolved }}">

            Notified:
            <form method="POST">
            <select class="form-control" name="facultyID" id="facultyDropdown">
                @foreach ($facultyNames as $row)
                    <option value="{{ $row->facultyID }}">{{ $row->facultyName }}</option>
                @endforeach
            </select>
            </form>
        @else
            <p>Appointment not found</p>
        @endif
        <hr>
        @if ($appointment)
            <form action="/updateAppointmentwithfaculty/{{ $appointment->id }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-primary" style="margin-right: 10px;">
                    <i class="bi bi-check-all"></i> APPROVED
                </button>
            </form>
        @endif
    </div>
@endsection
