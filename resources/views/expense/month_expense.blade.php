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

                                         <a  class=" btn btn-danger " href="{{url('singleMonth.expense/'.'january')}}">January</a>
                                          <a  class=" btn btn-sm btn-success" href="{{url('singleMonth.expense/'.'February')}}">February</a>
                                           <a  class=" btn brn-sm btn-primary" href="{{url('singleMonth.expense/'.'March')}}">March</a>
                                           <a  class=" btn btn-sm btn-secondary" href="{{url('singleMonth.expense/'.'April')}}">April</a>
                                           <a  class=" btn btn-sm btn-info" href="{{url('singleMonth.expense/'.'April')}}">May</a>
                                           <a  class=" btn btn-sm btn-primary" href="{{url('singleMonth.expense/'.'June')}}">June</a>
                                           <a  class=" btn btn-sm btn-warning" href="{{url('singleMonth.expense/'.'July')}}">July</a>
                                           <a  class=" btn btn-sm btn-danger" href="{{url('singleMonth.expense/'.'August')}}">August</a>
                                            <a  class=" btn btn-sm btn-primary" href="{{url('singleMonth.expense/'.'September')}}">September</a>
                                            <a  class=" btn btn-sm btn-danger" href="{{url('singleMonth.expense/'.'October')}}">October</a>
                                            <a  class =" btn btn-sm btn-success" href="{{url('singleMonth.expense/'.'November')}}">November</a>
                                            <a  class=" btn btn-sm btn-secondary" href ="{{url('singleMonth.expense/'.'December')}}">December</a>


                                        
                                        
                                        
                                        <h3 class="card-title mt-2"><span class="text-white bg-info" style="font-family:arial black; font-size:28px;"><b>{{$month}}</b></span> Monthly Expense</h3>
                                        <a href="{{route('add.expense')}}" class="btn btn-info float-right">Add New</a>


                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                                <table  id="datatable" class="table table-striped table-bordered dt-responsive " style="border-collapse: collapse; border-spacing: 0;  position:relative;width:90%; left:0px;right:0px; ">
                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                               <th>date</th>
                                                           
                                                            
                                                            <th>Amount</th>
                                                           

                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                       @foreach($curntdata as $row)
                                                        <tr>
                                                            <td>{{$row->details}}</td>
                                                             <td>{{$row->date}}</td>
                                                            <td>{{$row->amount}}</td>
                                                           

                                                        </tr>
                                                              @endforeach
                                                                   
                                                      
                                                    
                                                    </tbody>
                                                </table>
                                        <?php 
                                        $totalAmt=DB::table('expenses')->where('month',$month)->sum('amount');
                                        ?>
                                        <h2 class="text-danger bg-primary" align="center" style="">Total:<span class="text-white">{{$totalAmt}}</span>&nbsp;<span>taka</span></h2>


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
