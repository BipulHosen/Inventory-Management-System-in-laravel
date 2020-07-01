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
                                        <h3 class="card-title">All Employess</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-12">
                                                <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                            <th>Experience</th>
                                                            <th>Photo</th>

                                                          
                                                            <th>Nid_no</th>

                                                            <th>Salary</th>
                                                            <th>Vacation</th>
                                                            <th>City</th>
                                                            <th>Action</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($employee as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>{{$row->experience}}</td>
                                            <td><img src="{{$row->photo}}" style="width:80px; height:80px;"></td>
                                            <td>{{$row->nid_no}}</td>
                                            <td>{{$row->salary}}</td>
                                            <td>{{$row->vacation}}</td>
                                            <td>{{$row->city}}</td>
                                            <td><a href="{{URL::to('edit.employee/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{URL::to('delete.employee/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a></td>
                                        </tr>
                                              @endforeach
                                                   
                                                      
                                                    
                                                    </tbody>
                                                </table>

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
