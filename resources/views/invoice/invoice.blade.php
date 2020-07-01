@extends('layouts.app')

@section('content')
  <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Invoice</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Moltran</a></li>
                                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                            <li class="breadcrumb-item active">Invoice</li>
                                        </ol>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <!-- start row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- <div class="panel-heading">
                                                <h4>Invoice</h4>
                                            </div> -->
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h4 class="text-right"><img src="assets/images/logo-dark.png" height="18" alt="moltran"></h4>

                                            </div>
                                            <div class="float-right">
                                                <h5>Invoice # <br>
                                                            <strong>2015-04-23654789</strong>
                                                        </h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">

                                                <div class="float-left mt-4">
                                                    <address>
                                                            <strong>Name:{{$cusTomer->name}}</strong><br>
                                                            Shopname:{{$cusTomer->shopname}}<br>
                                                           Address:{{$cusTomer->address}}<br>
                                                            City:{{$cusTomer->city}}<br>
                                                            Phone:{{$cusTomer->phone}}
                                                            </address>
                                                </div>
                                                <div class="float-right mt-4">
                                                    <p><strong>Order Date: </strong> {{date("l jS \of F Y")}}</p>
                                                    <p class="mt-2"><strong>Order Status: </strong> <span class="badge badge-pink">Pending</span></p>
                                                    <p class="mt-2"><strong>Order ID: </strong>1</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Item</th>
                                                    
                                                                <th>Quantity</th>
                                                                <th>Unit Cost</th>
                                                                <th>Total</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php 
                                                                  $sl=1;
                                                            @endphp
                                                            @foreach($carts as $cus)
                                                            <tr>

                                                                <td>{{$sl++}}</td>
                                                                <td>{{$cus->name}}</td>
                                                                <td>{{$cus->qty}}</td>
                                                                <td>{{$cus->price}}</td>
                                                                <td>{{$cus->price*$cus->qty}}</td>
                                                               
                                                            </tr>
                                                            @endforeach
                                                           
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-3 offset-md-9">
                                                <p class="text-right"><b>Sub-total:</b> <?php
                                                        //  $total=DB::table('carts')
                                                        // ->selectRaw("SUM(qty*price) as total")
                                                        // ->pluck('total'); 


                                                        // echo $total;

                                                    $carts=DB::table('carts')->get();
                                                      $sum=0;

                                                    foreach($carts as $row)
                                                     {
                                                        $sum=$sum+$row->qty*$row->price;

                                                     }

                                                
                                                    echo $sum;
                                                  

                                                    ?></p>
                                               
                                                <p class="text-right">VAT: <?php  $vat=(($sum*21)/100); echo number_format($vat,3); ?></p>
                                                <hr>
                                                <h3 class="text-right">Total:{{$sum+$vat}}</h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                <a href="" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->

                

             

            </div>

                <!--payable modal-->

             <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                 <form method="POST" action="{{url('/final-invoice')}}" enctype="multipart/form-data">
                        @csrf
                <div class="modal-header">
                        <h5 class="modal-title">Invoice of {{$cusTomer->name}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span>Total:{{$sum+$vat}}</span><span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Payments</label>
                                <select class="form-control" name="payment_status">
                                    <option value="Handcash">Handcash</option>
                                     <option value="Cheque">Cheque</option>
                                      <option value="Due">Due</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Pay</label>
                                <input type="text" name="pay" class="form-control" id="field-2" >
                            </div>
                        </div>
                         <div class="col-md-4">
                            <div class="form-group">
                                <label for="field-2" class="control-label">Due</label>
                                <input type="text" name="due" class="form-control" id="field-2">
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="customer_id" value="{{$cusTomer->id}}">
                     <input type="hidden" name="order_date" value="{{date('d/m/y')}}">
                      <input type="hidden" name="order_status" value="pending">
                       <input type="hidden" name="total_products" value="<?php echo DB::table('carts')->get()->sum('qty'); ?>">
                        <input type="hidden" name="sub_total" value="{{$sum}}">
                         <input type="hidden" name="vat" value="{{$vat}}">
                         <input type="hidden" name="total" value="{{$sum+$vat}}">
                  
                   
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info waves-effect waves-light">submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

 

@endsection
