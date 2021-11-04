@extends('admin.admin_master')
@section('admin')

<div class="container-full">
		<!-- Content Header (Page header) -->
	 

		<!-- Main content -->
		<section class="content">

		 <!-- Basic Forms -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Edit Product</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body">
			  <div class="row">
				<div class="col">
					<form method="POST" action="{{ route('product.update', $product->id) }}">
					  @csrf
                      <div class="row">
						<div class="col-12">						
							
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Brand <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="brand_id" class="form-control required">
                                                <option value="" selected="" disabled>Select Brand</option>
                                                
                                                @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id? 'selected' : '' }}>{{ $brand->brand_name }}</option>
                                                @endforeach
            
                                            </select>
                                            @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Category  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="category_id" class="form-control" required>
                                                <option value="" selected="" disabled>Select Category</option>
                                                
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == $product->category_id? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                @endforeach
            
                                            </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>SubCategory  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="subcategory_id" class="form-control" required>
                                                <option value="" selected="" disabled>Select SubCategory</option>
                            
                                                @foreach($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id? 'selected' : '' }}>{{ $subcategory->subcategory_name }}</option>
                                                @endforeach


                                            </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name" class="form-control" value="{{ $product->product_name}}" required> 
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>
                                

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code" class="form-control" value="{{ $product->product_code }}" required> 
                                            @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control" value="{{ $product->product_qty }}" requireds> 
                                            @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>

                            </div>

                            

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Product Color <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color" class="form-control" placeholder="White, Blue, Black" value="{{ $product->product_color }}" required> 
                                            @error('product_color')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control" value="{{ $product->selling_price }}" required> 
                                            @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>Product Discount  <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount" class="form-control" value="{{ $product->discount }}"> 
                                            @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Product Tags <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags" class="form-control" data-role="tagsinput" placeholder="add tags" value="{{ $product->product_tags }}" required> 
                                            @error('product_tags')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Product Size <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size" class="form-control" value="{{ $product->product_size }}" data-role="tagsinput" placeholder="add tags" required> 
                                            @error('product_size')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror 
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="row">
                            
                                <div class="col-md-12">

                                
                                    <div class="form-group">
                                        <h5>Short Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_description" id="editor1" class="form-control" required placeholder="Textarea text" required>{!! $product->short_description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>

                            <div class="row">
                            
                                <div class="col-md-12">

                                
                                    <div class="form-group">
                                        <h5>Long Description <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="long_description" id="editor2" class="form-control" required placeholder="Textarea text" required>{!! $product->long_description !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                        
                            </div>


							<hr>
						
					
						</div>
					  </div>
						<div class="row">
							
							<div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_1" name="hot_deals" value="1" {{ $product->hot_deals == 1? "checked" : '' }}>
											<label for="checkbox_1">Hot Deals</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_2" name="featured" value="1" {{ $product->featured == 1? "checked" : '' }}>
											<label for="checkbox_2">Featured</label>
										</fieldset>
									</div>
								</div>
							</div>

                            <div class="col-md-6">
								<div class="form-group">
									<div class="controls">
										<fieldset>
											<input type="checkbox" id="checkbox_3" name="special_offer" value="1" {{ $product->special_offer == 1? "checked" : '' }}>
											<label for="checkbox_3">Special Offer</label>
										</fieldset>
										<fieldset>
											<input type="checkbox" id="checkbox_4" name="special_deals" value="1" {{ $product->special_deals == 1? "checked" : '' }}>
											<label for="checkbox_4">Special Deals</label>
										</fieldset>
									</div>
								</div>
							</div>
						</div>
						
						<div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product">
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
		<!-- /.content -->

        <section class="content">
            <div class="row">

                <div class="col-md-6">
                    <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Prouct Thumbnail <strong>Update</strong></h4>
                    </div>

                    <form method="POST" action="{{ route('product.update.thumbnail', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
               
                            <div class="col-md-6" style="display: block; margin: auto;">

                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($product->product_thumbnail) }}" style="height: 130px" id="thumbnail">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="" class="btn btn-sm btn-danger" id="delete" title="Delete Image"><i class="fa fa-trash"></i> </a>
                                        </h5>
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Change Image <span class="tx-danger"></span></label>
                                                <input type="file" class="form-control" name="product_thumbnail"  onChange="main_thumbnail(this)">
                                            </div>
                                        </p>
                        
                                    </div>
                                </div>

                            </div>
                 
                        </div>
                        <div class="text-xs right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Thumbnail" style="display: block; margin: auto;">
                        </div>
                        <br><br>
                    </form>
                    </div>
                </div>

<!-- ===================================================== -->
                
                <div class="col-md-6">
                    <div class="box bt-3 border-info">
                    <div class="box-header">
                        <h4 class="box-title">Prouct Images <strong>Update</strong></h4>
                    </div>

                    <form method="POST" action="{{ route('product.update.images') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row row-sm">
                            @foreach($images as $image)
                            <div class="col-md-6">

                                <div class="card">
                                    <img class="card-img-top" src="{{ asset($image->image_name) }}" style="height: 130px" id="image-{{$image->id}}">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('product.delete.images', $image->id) }}" class="btn btn-sm btn-danger" id="delete" title="Delete Image"><i class="fa fa-trash"></i> </a>
                                        </h5>
                                        <p class="card-text">
                                            <div class="form-group">
                                                <label for="" class="form-control-label">Change Image <span class="tx-danger"></span></label>
                                                <input type="file" class="form-control" name="image_name[{{ $image->id }}]"  onChange="main_thumbnail{{$image->id}}(this)">
                                            </div>
                                        </p>
                        
                                    </div>
                                </div>

                            </div>
                            @endforeach
                        </div>
                        <div class="text-xs right">
                            <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Images" style="display: block; margin: auto;">
                        </div>
                        <br><br>
                    </form>

                    
                    </div>
                </div>

                
            </div>
        </section>

	  </div>


      <script type="text/javascript">
        $(document).ready(function(){
            $('select[name="category_id"]').on('change', function(){
                var category_id = $(this).val();
                if(category_id){
                    $.ajax({
                        url: "{{ url('/category/subcategory/ajax') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success:function(data){
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value){
                                $('select[name="subcategory_id"]').append('<option value="' + value.id + '"> ' + value.subcategory_name + '</option>');
                            })
                        }
                    })
                } else {
                    alert('danger');
                }
            })
        })
      </script>

      <script>
          function main_thumbnail(input){
              if (input.files && input.files[0]){
                  var reader = new FileReader();
                  reader.onload = function(e){
                      $('#thumbnail').attr('src', e.target.result).width(80)
                  }
                  reader.readAsDataURL(input.files[0])
              }
          }
      </script>

      @foreach($images as $image)
      <script>
          function main_thumbnail{{$image->id}}(input){
              if (input.files && input.files[0]){
                  var reader = new FileReader();
                  reader.onload = function(e){
                      $('#image-{{$image->id}}').attr('src', e.target.result).width(80)
                  }
                  reader.readAsDataURL(input.files[0])
              }
          }
      </script>
      @endforeach
      <script>
 
        $(document).ready(function(){
        $('#multi_img').on('change', function(){ //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data
                
                $.each(data, function(index, file){ //loop though each file
                    if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file){ //trigger function on successful read
                        return function(e) {
                            var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                        .height(80); //create image element 
                            $('#preview_img').append(img); //append image to output element
                        };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });
                
            }else{
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
        });
        
        </script>



@endsection