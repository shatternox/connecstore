@extends('admin.admin_master')
@section('admin')



<div class="container-full">
		<!-- Content Header (Page header) -->
		<!-- Main content -->
    <section class="content">
	    <div class="row">


		    <div class="col-12">

			    <div class="box">
				    <div class="box-header with-border">
				        <h3 class="box-title">Products</h3>
				    </div>
				    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Product Name </th>
                                    <th>Image </th>
                                    <th>Price </th>
                                    <th>Quantity </th>
                                    <th>Discount </th>
                                    <th>Discounted Price</th>
                                    <th>Status </th>
                                    <th>Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td><img src="{{ asset($product->product_thumbnail) }}" alt="" style="width: 60px;"></td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->product_qty }}</td>
                                    <td>
                                        @if($product->discount == NULL)
                                        <span class="badge badge-pill badge-danger">No Discount</span>
                                        @else
                                        <span class="badge badge-pill badge-success">{{$product->discount}}%</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->discount == NULL)
                                        <span class="badge badge-pill badge-danger">No Discount</span>
                                        @else
                                        @php
                                        $discounted_price = $product->selling_price - $product->selling_price * $product->discount / 100;
                                        @endphp
                                        <span class="badge badge-pill badge-success">{{round($discounted_price)}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->status == 1)
                                            <span class="badge badge-pill badge-success">Active</span>
                                        @else
                                            <span class="badge badge-pill badge-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td width="30%">
                                        @if($product->status === 1)
                                        <a href="{{ route('product.inactive', $product->id) }}" class="btn btn-danger" title="Inactivate"><i class="fas fa-eye-slash"></i></a>
                                        @else
                                        <a href="{{ route('product.active', $product->id) }}" class="btn btn-success" title="Activate"><i class="fa fa-eye"></i></a>
                                        @endif
                                        
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-info" title="Edit Product"><i class="fa fa-pencil"></i></a>
                                        <a href="{{ route('product.delete', $product->id) }}" id="delete" class="btn btn-danger" title="Delete Product"><i class="fa fa-trash"></i></a>
                                                
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

            
		  </div>
		  <!-- /.row -->
    </section>
		<!-- /.content -->
	  
</div>







@endsection