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
                                        <h3 class="card-title">View Product</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/insert-product')}}" enctype="multipart/form-data">
                                        	@csrf
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">product_name</label>
                                             <p>{{$vproduct->product_name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                <p>{{$vproduct->cat_name}}</p>
                                                
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier</label>
                                               <p>{{$vproduct->name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <p>{{$vproduct->product_code}}</p>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">	product_route</label>
                                                <p>{{$vproduct->product_route}}</p>
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">product_garage</label>
                                                 <p>{{$vproduct->product_garage}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">buy_date</label>
                                                 <p>{{$vproduct->buy_date}}</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">	expire_date</label>
                                                 <p>{{$vproduct->expire_date}}</p>
                                            </div>


                                             <div class="form-group">
                                                <label for="exampleInputEmail1">buying_price</label>
                                                 <p>{{$vproduct->buying_price}}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">selling_price</label>
                                                 <p>{{$vproduct->selling_price}}</p>
                                            </div>
                                             <div class="form-group">
                                             	<img src="{{URL::to($vproduct->product_image)}}" id="image" style="width:80px; height:80px;">
                                              
                                            </div>
                                                 
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

