@extends('shop.main_master')
@section('shop')
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                <img class="card-img-top" style="border-radius: 50%" src="{{ !empty($user->profile_photo_path)? asset('upload/profile_images/' . $user->profile_photo_path) : asset('upload/default_profile.jpg') }}" alt="" width="100%" height="100%">
                <br>
                <br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>




            </div>
            <div class="col-md-2">


                


            </div>
            <div class="col-md-6">

                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Hello </span><strong>{{ Auth::user()->name }}</strong> Welcome to Funkostore</h3>

                </div>
                


            </div>
        </div>
    </div>
</div>



@endsection