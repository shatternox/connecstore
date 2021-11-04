@extends('admin.admin_master')
@section('admin')
<div class="container-full">
<section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Profile Edit</h4>
             
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col">
                <form action="{{ route('admin.profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                    <div class="col-12">						
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Name<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                    <input type="text" name="name" class="form-control" value="{{ $edit->name }}" required> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Email Address<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="email" name="email" class="form-control" value="{{ $edit->email }}" required> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Profile Picture <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="profile_photo_path" id="image" class="form-control"> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <img id="showImage" src="{{ !empty($edit->profile_photo_path)? asset('upload/profile_images/' . $edit->profile_photo_path) : asset('upload/default_profile.jpg') }}" style="width: 100px; height: 100px;">

                            </div>
                        </div>
                       
                    <div class="text-xs-right">

                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>
                </form>

            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
	
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