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
                                      <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Take Attendence</h3>
                                        <a class="btn btn-primary float-right" href="{{route('all.attendence')}}">All Attendence</a>
                                        <h2 align="center"><span class="bg-success">Today:{{date('d/m/y')}}</span></h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                            
                                               <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                             <th>Photo</th>
                                                           <!--   <th>Date</th>
                                                             <th>Year</th -->
                                                             <th>Action</th>

                                                        </tr>
                                                    </thead>
                                                    

                                                    <tbody>

                                                    	 <form id="insert_form" method="post" action="{{url('insert-attendence')}}" enctype="multipart/form-data">
                                                            	@csrf
                                                    	
                                                    
			                                          @foreach($attendebce as $row)
			                                        <tr>
			                                            <td>{{$row->name}}</td>
			                                          
			                                            
			                                            <td><img src="{{$row->photo}}" style="width:80px; height:80px;"></td>
			                                            
			                                            <td>
			                                            	<input type="text" name="user_id[]" value="{{$row->id}}">

			                                            	<input type="radio" required name="attendence[{{$row->id}}]" value="Present"> Present &nbsp;

			                                            	<input type="radio" required name="attendence[{{$row->id}}]" value="Absent"> Absent
			                                            </td>

			                                              <input type="hidden" name="att_date" value="{{date('d/m/y')}}">
			                                              <input type="hidden" name="att_year" value="{{date('Y')}}">

                                                           <input type="hidden" name="month" value="{{date('F')}}">
			                                              
                                                          </tr>
			                                       
			                                              @endforeach

			                                               
                                              
			                                               </form>
			                                           
			                                              
                                                    </tbody>
                                                      
                                                   
			                                         
                                                      
                                                </table>

                                                <input type="submit" form="insert_form" name="submit" class="text-white bg-primary" value="Take Atendence"style="font-size:28px;">
                                                
                                         
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                        </div>
                         

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

             

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
           <!--  <script type="text/javascript">
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
</script> -->


@endsection
