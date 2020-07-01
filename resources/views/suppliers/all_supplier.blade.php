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
                                        <h3 class="card-title">All Suppliers</h3>
                                        <a href="{{route('add.supplier')}}" class="btn btn-info float-right">Add New</a>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <table  id="datatable" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0;  position:relative;width:90%; left:0px;right:0px; ">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                           
                                                            <th>Phone</th>
                                                            <th>Address</th>
                                                           
                                                            <th>Photo</th>
                                                           
                                                            <th>City</th>
                                                            <th>Action</th>
                                                          

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($allsupplier as $row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                           
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->address}}</td>
                                         
                                            <td><img src="{{$row->photo}}" style="width:80px; height:80px;"></td>
                                          
                                            <td>{{$row->city}}</td>
                                            <td><a href="{{URL::to('edit.supplier/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{URL::to('delete.supplier/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>

                                            
                                            <a href="{{URL::to('view.supplier/'.$row->id)}}"  class="btn btn-sm btn-danger">View</a>

                                        </td>

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

           <!--  <script>
                $(document).ready(function(){$("#datatable1").DataTable()});
            </script>
          -->

@endsection
