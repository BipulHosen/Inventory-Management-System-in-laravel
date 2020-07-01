@extends('layouts.app')
<style>
    table{
        width:100%;

    }
    th{
        background-color:green;
        color:white;
    }
    table, td,th{
        border:1px solid black;
    }
</style>

@section('content')
 <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12 ">
                                <div class="page-title-box bg-info">
                                  <!--   <h4 class="page-title">Welcome !</h4> -->
                                    <div class="page-title-right">
                                        <ul class="p-0 m-0 list-unstyled">
                                            <li class=" bg-info text-white float-left"><a href="#">Pos(Point of sale)</a></li>

                                            <li class="float-right active">Inventory/{{date('d/m/y')}}</li>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div><br>
                        <!-- <form method="post" action="" enctype="multipart/form-data"> -->
                        <div class="row">
                        	<div class="col-lg-12 col-md-12 col-sm-12">
                        		<div class="portfolioFilter">
                        			@foreach($categories as $row)
                        			<a href="" class="current" data-filter="*">{{$row->cat_name}}</a>
                        			@endforeach
                        		</div>
                        	</div>
                        </div>
                        <br>

                      
                        <div class="row">
                        	<div class="col-lg-6 col-sm-6 col-6 col-md-6">
                        		<div class="card">
                        			<div class="card-header">
                        				<h2 class="form-control">Customer</h2>
                        				<a class="text-info btn btn-lg float-right"><span class="bg-info text-white" data-toggle="modal" data-target="#con-close-modal">Add New</span></a>
                        			</div>
                        			<div class="card-body">

                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            
                                            <ul>
                                              <li>Select A Customer First !</li>
                                            </ul>
                                        </div>
                                        @endif
                        				
                        				<select class="form-control" name="cus_id" form="create_invoice">
                        					<option disabled selected=""></option>

                        					@foreach($customers as $row)
                        					<option value="{{$row->id}}">{{$row->name}}</option>
                        						@endforeach
                        				</select>
                                        <br>
                                    
                                            <div class="p-0 m-0 text-center table-responsive  pb-2">
                                              
                                                     <table class=" " >
                                                        <thead>
                                                            <tr>
                                                                <th style="text-align:center">Name</th>
                                                                 <th style="text-align:center">Qnty</th>
                                                                 <th style="text-align:center">Price</th>
                                                                 <th style="text-align:center">Sub Total</th>
                                                                 <th  style="text-align:center">Action</th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            <?php $product=DB::table('carts')->get();?>

                                                            @foreach($product as $prod)
                                                            <tr>
                                                                <td>{{$prod->name}}</td>

                                                                <td style="padding:0px; text-align:center">
                                                             <form  method="post"  action="{{url('/update.cart/'.$prod->id)}}" enctype="multipart/form-data">
                                                                @csrf


                                                            <input type="number" name="qty" min="1" value="{{$prod->qty}}" style="width:50%;">

                                                            <input type="text" name="id" value="{{$prod->id}}">

                                                            <button type="submit" name="submit" class="btn btn-success "><i class="fa fa-check"></i> </button>
                                                             </form>
                                                        </td>
                                                                <td>{{$prod->price}}</td>
                                                                 <td>{{$prod->price*$prod->qty}}</td>
                                                                 <td style="text-align:center;"><a href="{{url('/cart-remove/'.$prod->id)}}"><i class="fas fa-trash"></i></a></td>
                                                            </tr>

                                                            @endforeach
                                                            
                                                        </tbody>
                                                    </table>
                                           

                                            </div>
                                       
                                         <div class="pricing-header bg-primary rounded-top">
                                            
                                                    <p style="padding-left:32px; font-size:23px;color:#f5eeee">Quantity:<?php
                                                    echo DB::table('carts')->get()->sum('qty'); 

                                                    ?></p>
                                                    <p style="padding-left:32px; font-size:23px;color:#f5eeee">Sub Total:<?php
                                                        //  $total=DB::table('carts')
                                                        // ->selectRaw("SUM(qty*price) as total")
                                                        // ->pluck('total'); 


                                                        // echo $total;

                                                    $carts=DB::table('carts')->get();
                                                      $sum=0;

                                                    foreach($carts as $row)
                                                     {
                                                        $sum=$sum+$row->qty*$row->price;

                                                     }

                                                
                                                    echo $sum;
                                                  

                                                    ?></p>
                                                    <p style="padding-left:78px; font-size:23px;color:#f5eeee">vat:<?php  $vat=(($sum*21)/100); echo number_format($vat,3); ?></p>
                                                    <hr class="border">
                                                    <p style="padding-left:32px; font-size:23px;color:#f5eeee">Total:{{$vat+$sum}}</p>
                                             
                                            </div>


                        			</div>
                                    <form method="post" action="{{url('/invoice')}}" enctype="multipart/form-data" id="create_invoice">
                                        @csrf
                                    <span class="text-center"><input type="submit" name="submit" value="Create Invoice" class="btn btn-success"></span>
                                </form>

                        		</div>

                        	</div>
                    <!--     </form> -->




                        	<div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        		
                        		   <table  id="" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0;  position:relative;width:92%; left:0px;right:0px; ">
                                              <thead>
                                                       <tr>
                                                           <th>Image</th>
                            
                                                            <th>Name</th>
                                                             <th>Category</th>
                                                             <th>product Code</th>
                                                             <th>action</th>
                                                        </tr>
                                              </thead>

                                                    <tbody>
                                                            @foreach($products as $row)

                                                       
                                                        <tr>

                                                     <form method="POST" role="form"  id=""  action="{{route('add.cart')}}" enctype="multipart/form-data">
                                                            @csrf

                                                         <input type="text" name="id"  value="{{$row->id}}">
                                                            <input type="text" name="name" value="{{$row->product_name}}">
                                                            <input type="text" name="qty" value="1">
                                                            <input type="text" name="price" value="{{$row->selling_price}}">
                                                           
  
                                                          
                                                        
                                                        	<td><img src="{{$row->product_image}}" height="80" width="80"></td>
                                                            <td>{{$row->product_name}}</td>
                                                            <td>{{$row->cat_name}}</td>
                                                            <td>{{$row->product_code}} <input type="hidden" name="code" value="{{$row->product_code}}"></td>

                                                            
                                                            <td>
                                                         <button type="submit"   class="btn btn-sm btn-success"><i class="fas fa-plus-square"></i></button>
                                                          </td>
                                                            
                                                             </form>



                                                     
                                                           
                                                        </tr>


                                                      

                                                         
                                                          @endforeach
                                                         
                                                     
                                                  </tbody>
                                     </table>

                        	</div>
                        	
                        </div>
               
                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

            </div>
                                       

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!--customer add modal-->

             <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                 <form method="POST" action="{{url('/insert-customer')}}" enctype="multipart/form-data">
                        @csrf
                <div class="modal-header">
                        <h5 class="modal-title">Add a new Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" id="field-1" placeholder="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Email</label>
                                <input type="text" name="email" class="form-control" id="field-2" placeholder="email">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Phone</label>
                                <input type="text" name="phone" class="form-control" id="field-2" placeholder="phone">
                            </div>
                        </div>
                    </div>
                       <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Address</label>
                                <input type="text" name="address" class="form-control" id="field-1" placeholder="address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Shopname</label>
                                <input type="text" class="form-control" id="field-2" name="shopname" placeholder="shopname">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">account_holder</label>
                                <input type="text" name="account_holder" class="form-control" id="field-1" placeholder="account_holder">
                            </div>
                        </div>
                        
                    </div>
                     <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">account_number</label>
                                <input type="text" name="account_number" class="form-control" id="field-2" placeholder="account_number">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">bank_name</label>
                                <input type="text" name="bank_name" class="form-control" id="field-2" placeholder="bank_name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label"> bank_branch</label>
                                <input type="text" name="bank_branch" class="form-control" id="field-1" placeholder="bank_branch">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">city</label>
                                <input type="text" name="city" class="form-control" id="field-2" placeholder="city">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">photo</label>
                               <img src="" id="image">
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">New photo</label>
                                <input type="file"  id="input" placeholder="Enter Photo" name="photo" accept="image/*" required onchange="readURL(this);">
                            </div>
                        </div>
                       
                    </div>
                
                  
                   
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


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
