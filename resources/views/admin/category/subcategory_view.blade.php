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
				        <h3 class="box-title">Sub Categories</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory['category']['category_name'] }}</td>
                                    <td>{{ $subcategory->subcategory_name }}</td>
                                    <td width="30%">
                                        <a href="{{ route('subcategory.edit', $subcategory->id) }}" class="btn btn-info" title="Edit Brand"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('subcategory.delete', $subcategory->id) }}" id="delete" class="btn btn-danger" title="Delete Brand"><i class="fa fa-trash"></i></a>
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

            <!-- Add Category -->
            <div class="col-4">

			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Add Sub Category</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <form action="{{ route('subcategory.store') }}" method="POST">
                            @csrf
                        					 
                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="" disabled>Select Category</option>
										
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
	
									</select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror 
								</div>
							</div>

                            <div class="form-group">
                                <h5>Sub Category<span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="subcategory_name" class="form-control" value="">
                                @error('subcategory_name')
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










