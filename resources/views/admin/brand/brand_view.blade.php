@extends('admin.admin_master')
@section('admin')



<div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
    <section class="content">
	    <div class="row">


		    <div class="col-8">

			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Brands</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Brand</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td><img src="{{ asset( $brand->brand_image ) }}" alt="" width="70px" height="40px"></td>
                                    <td>
                                        <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-info" title="Edit Brand"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('brand.delete', $brand->id) }}" id="delete" class="btn btn-danger" title="Delete Brand"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->          
			</div>
			<!-- /.col -->

            <!-- Add brand -->
            <div class="col-4">

			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Add Brand</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        					
                                   
                            <div class="form-group">
                                <h5>Brand<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="brand_name" class="form-control" value="" > 
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
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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