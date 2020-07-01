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
                                        <h3 class="card-title">View Customer</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/insert-customer')}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                               <p>{{$singleCustomer->name}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                 <p>{{$singleCustomer->email}}</p>
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                   <p>{{$singleCustomer->phone}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                   <p>{{$singleCustomer->address}}</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">shopname</label>
                                                   <p>{{$singleCustomer->shopname}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1">account_holder</label>
                                                   <p>{{$singleCustomer->account_holder}}</p>
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">account_number</label>
                                                   <p>{{$singleCustomer->account_number}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">bank_name</label>
                                                   <p>bank_name</p>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">bank_branch</label>
                                                   <p>{{$singleCustomer->bank_branch}}</p>
                                            </div>


                                             <div class="form-group">
                                                <label for="exampleInputEmail1">city</label>
                                                   <p>{{$singleCustomer->city}}</p>
                                            </div>
                                             <div class="form-group">
                                             	
                                                <label for="exampleInputPassword1">Photo</label><br>
                                                   <p><img src="{{URL::to($singleCustomer->photo)}}" style="width:80px; height:80px;"></p>
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

