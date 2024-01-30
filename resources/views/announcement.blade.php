@extends('/layouts.app')

@section('content')
    <link href="{{ asset('CSS/announcement.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="container-fluid d-flex flex-row p-2">
            <h1>ANNOUNCEMENT</h1>
            <div class="w-100 button">
                <button class="btn btn-primary m-0" data-bs-toggle="modal" data-bs-target="#exampleModalToggle"><i
                        class="bi bi-plus-square-fill"></i> Add Annoucement</button>
            </div>
        </div>
        <hr style="border: 2px solid black;">
        @foreach ($posts as $posts)
            <div class="card mb-3">
                <div class="d-flex w-100" style="width: 100% !important;">
                    <p class="card-header w-25">{{ $posts->user->first_name }} {{ $posts->user->last_name }}</p>
                    <p class="card-header flex-center w-75" style="text-align: right;">{{ $posts['created_at'] }}</p>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $posts['announcement_details'] }}</h5>
                    <hr>
                    <div class="modal-footer">
                        <form action="/editQueueAnnounce/{{ $posts->id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="announcement_status" value="ARCHIVE"
                                style="border:none;visibility:hidden">
                            <button class="btn btn-danger">Remove</button>
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
                    <h5 class="modal-title" id="exampleModalToggleLabel">ANNOUNCEMENT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('announcement.stored') }}" method="post" class="form-group">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <label class="form-group">Announcement Details:</label>
                        <input type="text" class="form-control mb-2" placeholder="Details" name="announcement_details">

                        <label>Date Posted:</label>
                        <input type="date" class="form-control mb-2" name="date_posted">

                        <label>Until</label>
                        <input type="date" class="form-control mb-2" name="date_until">

                        <label class="form-group">Announcement Status:</label>
                        <input type="text" class="form-control mb-2" value="ACTIVE" name="announcement_status">

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
