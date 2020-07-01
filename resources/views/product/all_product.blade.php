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
                                        <h3 class="card-title">All Products</h3>
                                        <a href="{{route('add.product')}}" class="btn btn-info float-right">Add New</a>

                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <table  id="datatable" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0;  position:relative;width:90%; left:0px;right:0px; ">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                           
                                                            <th>Code</th>
                                                            <th>Selling Price</th>
                                                           
                                                            <th>Image</th>
                                                           
                                                            <th>Garage</th>
                                                             <th>Route</th>
                                                            <th>Action</th>
                                                          

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach($allproducts as $row)
                                        <tr>
                                            <td>{{$row->product_name}}</td>
                                           
                                            <td>{{$row->product_code}}</td>
                                            <td>{{$row->selling_price}}</td>
                                         
                                            <td><img src="{{$row->product_image}}" style="width:80px; height:80px;"></td>
                                          <td>{{$row->product_garage}}</td>
                                            <td>{{$row->product_route}}</td>
                                            <td><a href="{{URL::to('edit-product/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                            <a href="{{URL::to('delete-product/'.$row->id)}}" id="delete" class="btn btn-sm btn-danger">Delete</a>

                                            
                                            <a href="{{URL::to('view.product/'.$row->id)}}"  class="btn btn-sm btn-danger">View</a>

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
