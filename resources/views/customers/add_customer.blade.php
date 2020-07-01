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
                                        <h3 class="card-title">Add Customer</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/insert-customer')}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="name" placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Email" >
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="phone" placeholder="Enter Phone" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="address" placeholder="Enter Address" required>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">shopname</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="shopname" placeholder="Enter shopname" >
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">account_holder</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="account_holder" placeholder="Enter account holder" >
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">account_number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="account_number" placeholder="Enter account number" >
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">bank_name</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="bank_name" placeholder="Enter bank name" >
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">bank_branch</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="bank_branch" placeholder="Enter bank branch" >
                                            </div>


                                             <div class="form-group">
                                                <label for="exampleInputEmail1">city</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="city" placeholder="Enter City" >
                                            </div>
                                             <div class="form-group">
                                             	<img src="#" id="image">
                                                <label for="exampleInputPassword1">Photo</label><br>
                                                <input type="file"  id="exampleInputPassword1" 
                                                name="photo"  placeholder="Enter Photo" accept="image/*"  onchange="readURL(this);">
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

