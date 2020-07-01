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
                                        <h3 class="card-title">Edit Supplier</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('update.supplier/'.$edit->id)}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="name" placeholder="Enter Name" value="{{$edit->name}}"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" id="exampleInputPassword1" placeholder="Enter Email" value="{{$edit->email}}">
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Phone</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="phone" placeholder="Enter Phone" value="{{$edit->phone}}"required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="address" placeholder="Enter Address" value="{{$edit->address}}"required>
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Shopname</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="shop" placeholder="Enter Shop" value="{{$edit->shop}}">
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputEmail1"> Account_holder</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="accountholder" placeholder="Enter account_holder" value="{{$edit->accountholder}}">
                                            </div>
                                           
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Account_number</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="accountnumber" placeholder="Enter account_number" value="{{$edit->accountnumber}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank_name</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="bankname" placeholder="Enter bank_name" value="{{$edit->bankname}}">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">bank_branch</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="branchname" placeholder="Enter bank_branch" value="{{$edit->branchname}}">
                                            </div>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">City</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="city" placeholder="Enter city" value="{{$edit->city}}">
                                            </div>
                                               <div class="form-group">
                                                <label for="exampleInputEmail1">Supplier Type</label>
                                               <!--  <input type="text" class="form-control" id="exampleInputEmail1" 
                                                name="type" placeholder="Enter type" value="{{$edit->type}}"> -->
                                                <?php $suppliers=App\Supplier::all();?>
                                                <select name="type" class="form-control">
                                                    @foreach($suppliers as $row)
                                                <option <?php if($edit->type==$row->type){echo "selected";} ?> value="{{$row->type}}">{{$row->type}}</option>
                                                @endforeach
                                               
                                            </select>
                                            </div>
                                             <div class="form-group">
                                             	<img src="" id="image">
                                                <br>
                                                <label for="exampleInputPassword1">New Photo</label><br>
                                                <input type="file"  id="exampleInputPassword1" 
                                                name="photo"  placeholder="Enter Photo" accept="image/*" onchange="readURL(this);">
                                            </div>

                                              <div class="form-group">
                                              
                                                <label for="exampleInputPassword1">Old Photo</label><br>
                                                  <img src="{{URL::to($edit->photo)}}"  style="width:80px; height:80px;" name="old_photo">

                                                
                                              
                                            </div>
                                            
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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
