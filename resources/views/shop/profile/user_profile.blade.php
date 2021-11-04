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
                    <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>




            </div>
            <div class="col-md-2">


                


            </div>
            <div class="col-md-6">

                <div class="card">
                    <h3 class="text-center"><span class="text-danger">Update Your Profile </h3>


                    <div class="card-body">
                        <form action="{{ route('user.profile.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone Number </label>
                                <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" >
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Profile Picture</label>
                                <input type="file" name="profile_photo_path" class="form-control" id="image">
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

@endsection