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
				        <h3 class="box-title">Edit Sub Category</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <form action="{{ route('subcategory.update', $subcategory->id) }}" method="POST">
                            @csrf
                        					
                                   
                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="{{ $subcategory->category_id }}" selected="" disabled>Select Category</option>
										
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $category->id == $subcategory->category_id ? "selected" : '' }}>{{ $category->category_name }}</option>
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
                                <input type="text" name="subcategory_name" class="form-control" value="{{ $subcategory->subcategory_name }}">
                                @error('subcategory_name')
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