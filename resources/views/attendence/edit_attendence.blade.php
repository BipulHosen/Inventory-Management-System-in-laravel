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
                                        <h3 class="card-title text-primary text-center">Update Attendence  <span class="text-secondary" style="font-size:25px;">{{$date->att_date}}</span></h3>
                                        <!-- <h2 align="center"><span class="bg-success">Today:{{date('d/m/y')}}</span></h2> -->
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                            
                                               <table  class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                             <th>Photo</th>
                                                            <!--  <th>Date</th> -->
                                                             <th>Attendence</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    

                                                    <tbody>

                                                    	 <form id="insert_form" method="post" action="{{url('update-attendence/'.$edit_date)}}" enctype="multipart/form-data">
                                                            	@csrf
                                                    	@foreach($allAttendences as $row)
			                                        <tr>
			                                            <td>{{$row->name}}</td>
			                                          
			                                            
			                                            <td><img src="{{URL::to($row->photo)}}" style="width:80px; height:80px;"></td>
			                                            <!-- <td>{{$row->att_date}}</td> -->
			                                            
			                                            <td>
			                                            	<input type="text" name="id[]" value="{{$row->user_id}}">


			                                            	<input type="radio" <?php if($row->attendence=="Present"){ echo "checked";} ?> required name="attendence[{{$row->user_id}}]" value="Present"> Present &nbsp;

                                                            <input type="radio"  <?php if($row->attendence=="Present"){ echo "checked";} ?> hidden required name="org_attendence[{{$row->user_id}}]"  value="Present"> 

			                                            	<input type="radio" hidden <?php if($row->attendence=="Absent"){ echo "checked";} ?> required name="org_attendence[{{$row->user_id}}]" value="Absent"> 

                                                            <input type="radio" <?php if($row->attendence=="Absent"){ echo "checked";} ?> required name="attendence[{{$row->user_id}}]" value="Absent"> Absent
			                                            </td>

			                                              <input type="hidden" name="att_date" value="{{$row->att_date}}">
			                                              <input type="hidden" name="att_year" value="{{$row->att_year}}">

			                                               <input type="hidden" name="month" value="{{$row->month}}">
			                                              
                                                          </tr>
			                                       
			                                              @endforeach

			                                               
                                              
			                                               </form>
			                                           
			                                              
                                                    </tbody>
                                                      
                                                   
			                                         
                                                      
                                                </table>

                                                <input type="submit" form="insert_form" name="submit" class="text-white bg-primary" value="update attendence"style="font-size:28px;">
                                                
                                         
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
