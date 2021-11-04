@extends('admin.admin_master')
@section('admin')



<div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
    <section class="content">
	    <div class="row">

            <!-- Add brand -->
            <div class="col-12">

			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Edit Brand</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <form action="{{ route('brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        					
                                   
                            <div class="form-group">
                                <h5>Brand<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="brand_name" class="form-control" value="{{ $brand->brand_name }}" > 
                                @error('brand_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Brand Image<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="file" name="brand_image" class="form-control" value="">
                                @error('brand_image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror 
                                </div>
                            </div>
                           
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                            </div>
                        </form>
                        </div>
                    </div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->          
			</div>
		  </div>
		  <!-- /.row -->
    </section>
		<!-- /.content -->
	  
</div>







@endsection