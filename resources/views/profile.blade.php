@extends('/layouts.app')

@section('content')
    <link href="{{ asset('CSS/dashboard.css') }}" rel="stylesheet">
    <div class="container-fluid">
        <div class="container-fluid p-2">
            <div class="container-fluid">
                <div class="row">
                  {{-- <div class="col-4">
                    <div class="container">
                        <img src="" alt="" class="w-100 p-2 rounded" style="height: 400px; border:2px solid gray;">
                        <form action="{{ url('/uploadProfileImage/' . Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <input type="file" name="profile_image" class="form-control mt-2 mb-2">
                          <button type="submit" class="btn btn-primary form-control">Upload Image</button>
                       </form>
                       
                        <button class="btn btn-primary form-control mt-2">Edit Profile</button>
                    </div>
                  </div> --}}
                  <div class="col">
                    <div class="container rounded border">
                        <label for="fname" class="mt-3">First Name</label>
                        <input type="text" name="" id="" disabled class="form-control" value="{{ Auth::user()->first_name}}">
                        <label for="=lname" class="mt-3">Last Name</label>
                        <input type="text" name="" id="" disabled class="form-control" value="{{ Auth::user()->last_name}}">
                        <label for="idnum" class="mt-3">ID Number</label>
                        <input type="text" name="" id="" disabled class="form-control" value="{{ Auth::user()->user_id}}">
                        <label for="=phonenum" class="mt-3">Phone Number</label>
                        <input type="text" name="" id="" disabled class="form-control" value="{{ Auth::user()->phone_number}}">
                        <label for="=E-mail" class="mt-3">E-mail</label>
                        <input type="text" name="" id="" disabled class="form-control" value="{{ Auth::user()->email}}">
                        <label for="=E-mail" class="mt-3">Biography</label>
                        <textarea name="" id="" cols="20" rows="5" disabled class="form-control mb-3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
