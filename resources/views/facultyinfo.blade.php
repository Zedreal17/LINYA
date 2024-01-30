@extends('/layouts.app')

@section('content')
    <link href="{{ asset('CSS/announcement.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="container-fluid d-flex flex-row p-2">
            <h1>FACULTY</h1>
            <div class="w-100 button">
                <button class="btn btn-primary m-0" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"><i
                        class="bi bi-plus-square-fill"></i> Add Faculty</button>
            </div>
        </div>
        <hr style="border: 2px solid black;">
        @foreach ($posts as $posts)
            <div class="card mb-3">
                <p class="card-header">{{ $posts['facultyName'] }}</p>
                <div class="card-body">
                    <h5 class="card-title">{{ $posts['facultyContact'] }}</h5>

                    <hr>
                    <div class="modal-footer">
                        <form action="/editQueueAnnounce/{{ $posts->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="announcement_status" value="ARCHIVE"
                                style="border:none;visibility:hidden">
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">FACULTY INFORMATION</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('facultyinfo.stored') }}" method="post" class="form-group">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label class="form-group">Faculty Name:</label>
                        <input type="text" class="form-control mb-2" placeholder="Details" name="facultyName">

                        <label>Contact Number</label>
                        <input type="text" class="form-control mb-2" name="facultyContact">


                        <label class="form-group">Faculty Status:</label>
                        <input type="text" class="form-control mb-2" value="ACTIVE" name="facultyStatus">


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
