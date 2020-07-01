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
                                    <div class="card-header bg-info">
                                        <h3 class="card-title">Advance Salary Provide</h3></div><br>
                                         <div class="mb-0" >
                                           
                                                 <a href="{{route('all.advancedsalary')}}" class="btn btn-primary float-right">All Advanced salary</a>
                                           </div>
                                          
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            
                                            <ul>
                                                @foreach($errors->all as $error)
                                                <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    <div class="card-body">
                                        <form method="post" action="{{url('/insert-advancedsalary')}}" enctype="multipart/form-data">
                                        	@csrf


                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Employee Name</label>
                                                
                                                @php 

                                                $employes=App\Employee::all();

                                                @endphp
                                                <select name="emp_id" class="form-control">
                                                	<option disabled selected=""></option>
                                                	@foreach($employes as $row)
                                                	<option value="{{$row->id}}">{{$row->name}}</option>

                                                	@endforeach
                                                

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Month</label>
                                                 <select name="month" class="form-control">
                                                	<option disabled selected=""></option>
                                                
                                                	<option value="January">January</option>
                                                	<option value="February">February</option>
                                                	<option value="March">March</option>
                                                	<option value="April">April</option>
                                                	<option value="May">May</option>
                                                	<option value="Jun">Jun</option>
                                                	<option value="July">July</option>
                                                	<option value="August">August</option>
                                                	<option value="September">September</option>
                                                	<option value="October">October</option>
                                                	<option value="November">November</option>
                                                	<option value="December">December</option>
                                                </select>
                                                
                                            </div>

                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Advance salary</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1"
                                                name="advanced_salary" placeholder="Enter Advance salary" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Year</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1"
                                                name="year" placeholder="Enter Year" required>
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
