@extends('layouts.app')

@section('content')
 <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Welcome !</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Inventory</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!--Widget-4 -->
                        <div class="row">
                           
                               <!-- Basic example -->
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Product</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/update-product/'.$editProduct->id)}}" enctype="multipart/form-data">
                                        	@csrf
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">product_name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="product_name" value="{{$editProduct->product_name}}" placeholder="Enter product name" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                @php 
                                                $categories=DB::table('categories')->get();
                                                  
                                                @endphp
                                                <select name="cat_id" class="form-control">
                                                	<option selected=""></option>
                                                	 @foreach($categories as $row)

                                                	<option <?php if($editProduct->cat_id==$row->id){echo "selected";}?> value="{{$row->id}}">{{$row->cat_name}}</option>
                                                	@endforeach
                                                
                                                </select>
                                                
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier</label>
                                                @php 
                                                $suppliers=DB::table('suppliers')->get();
                                                  
                                                @endphp
                                                <select name="sup_id" class="form-control">
                                                	<option disabled selected=""></option>
                                                	 @foreach($suppliers as $row)

                                                	<option <?php if($editProduct->sup_id==$row->id){echo "selected";}?> value="{{$row->id}}">{{$row->name}}</option>
                                                	@endforeach
                                                
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="product_code" value="{{$editProduct->product_code}}" placeholder="Enter product Code" required>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">	product_route</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="product_route" value="{{$editProduct->product_route}}" placeholder="Enter product route" >
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">product_garage</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="product_garage" value="{{$editProduct->product_garage}}" placeholder="Enter product garage" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">buy_date</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1"
                                                name="buy_date" value="{{$editProduct->buy_date}}" placeholder="Enter buy date" >
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">	expire_date</label>
                                                <input type="date" class="form-control" id="exampleInputEmail1" 
                                                name="expire_date" value="{{$editProduct->expire_date}}" placeholder="Enter expire date" >
                                            </div>


                                             <div class="form-group">
                                                <label for="exampleInputEmail1">buying_price</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="buying_price" value="{{$editProduct->buying_price}}" placeholder="Enter buying price" >
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">selling_price</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="selling_price" value="{{$editProduct->selling_price}}" placeholder="Enter selling price" >
                                            </div>
                                             <div class="form-group">
                                             	<img src="#" id="image">
                                                <label for="exampleInputPassword1">product_image</label><br>
                                                <input type="file"  id="exampleInputPassword1" 
                                                name="product_image"  placeholder="Enter Photo" accept="image/*"  onchange="readURL(this);">
                                                <input type="hidden" name="old_image" value="{{$editProduct->product_image}}">
                                            </div>
                                            
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div>
                                    <!-- card-body -->
                                </div>
                                <!-- card -->
                            </div>
                        </div>
                         

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

             

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <script type="text/javascript">
	function readURL(input) {
		
     if(input.files && input.files[0])
     {
     	var reader=new FileReader();
     	reader.onload=function(e)
     	{
          $("#image").attr('src',e.target.result).height(80).width(80);
     	};
     	reader.readAsDataURL(input.files[0]);
     }
   }
</script>

@endsection

