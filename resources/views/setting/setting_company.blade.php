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
                                        <h3 class="card-title">Update Company Info</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('update.setting/'.$settings->id)}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="company_name" placeholder="Enter Name" value="{{$settings->company_name}}"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Email</label>
                                                <input type="email" class="form-control" name="company_email" id="exampleInputPassword1" placeholder="Enter Email" value="{{$settings->company_email}}"required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Company Phone</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="company_phone" placeholder="Enter Phone" value="{{$settings->company_phone}}"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="company_address" placeholder="Enter Address" value="{{$settings->company_address}}"required>
                                            </div>
                                         

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">company_mobile</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="company_mobile" placeholder="Enter Nid No" value="{{$settings->company_mobile}}"required>
                                            </div>
                                           
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">company_country</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="company_country" placeholder="Enter Vacation" value="{{$settings->company_country}}"required>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">company_city</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="company_city" placeholder="Enter City" value="{{$settings->company_city}}"required>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">company_zipcode</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="company_zipcode" placeholder="Enter City" value="{{$settings->company_zipcode}}"required>
                                            </div>
                                             <div class="form-group">
                                             	<img src="" id="image">
                                                <br>
                                                <label for="exampleInputPassword1">company_logo</label><br>
                                                <input type="file"  id="exampleInputPassword1" 
                                                name="company_logo"  placeholder="Enter Photo" accept="image/*" onchange="readURL(this);">
                                            </div>

                                              <div class="form-group">
                                              
                                                <label for="exampleInputPassword1">Old Photo</label><br>
                                                  <img src="{{URL::to($settings->company_logo)}}"  style="width:80px; height:80px;" name="old_photo">

                                                  <input type="hidden" name="old_photo" value="{{$settings->company_logo}}">

                                                
                                              
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
