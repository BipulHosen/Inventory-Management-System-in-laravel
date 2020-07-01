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
                                        <h3 class="card-title">Add Expenses</h3>
                                        <a href="{{route('todays.expense')}}" class="float-right btn btn-danger text-white">Todays Expense</a>
                                        <a href="{{route('month.expense')}}" class="float-right btn btn-success text-white">This Month Expense</a>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{url('/insert-amount')}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Details</label>
                                                <textarea  class="form-control" id="exampleInputEmail1"
                                                name="detail"  required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Amount</label>
                                                <input type="text" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Enter amount" >
                                            </div>
                                            <div class="form-group">
                                              
                                                <input type="hidden" class="form-control" id="exampleInputPassword1"
                                                name="date" value="{{date('d/m/y')}}" required>
                                            </div>

                                             <div class="form-group">
                                              
                                                <input type="hidden" class="form-control" id="exampleInputEmail1"
                                                name="month" value="{{date('F')}}" required>
                                            </div>

                                             <div class="form-group">
                                              
                                                <input type="hidden" class="form-control" id="exampleInputEmail1"
                                                name="year" value="{{date('Y')}}"  required>
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
            

@endsection

