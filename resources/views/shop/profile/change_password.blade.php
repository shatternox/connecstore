@extends('shop.main_master')
@section('shop')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <br>
                <img class="card-img-top" style="border-radius: 50%" src="{{ !empty($user->profile_photo_path)? asset('upload/profile_images/' . $user->profile_photo_path) : asset('upload/default_profile.jpg') }}" alt="" width="100%" height="100%" id="showImage">
                <br>
                <br>
                <ul class="list-group list-group-flush">
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>




            </div>
            <div class="col-md-2">


                


            </div>
            <div class="col-md-6">

                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Change your Password </h3>


                    <div class="card-body">
                        <form action="{{ route('user.update.password') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h5>Current Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="password" id="current_password" name="oldpassword" class="form-control" required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>New Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="password" id="password" name="password" class="form-control"  required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Confirm Password<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"  required> 
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger" type="submit">Update</button>
                            </div>

                        </form>
                    </div>

                </div>
                


            </div>
        </div>
    </div>
</div>


@endsection