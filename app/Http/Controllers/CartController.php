<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    //
 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	// echo $request->name;exit;


       
        $finddata=DB::table('carts')->where('name',$request->name)->where('code',$request->code)->first();
        // echo "<pre>";
        // print_r($finddata);
        // echo "</pre>";
      
        if($finddata)
        {

        $qty=DB::table('carts')->where('name',$request->name)->where('code',$request->code)->first()->qty;

         $data=array();
         $data['qty']=($request->qty+(int)$qty);
       

       

         $cartt=DB::table('carts')
         ->where('name',$request->name)
         ->where('code',$request->code)
         ->update($data);

          if($cartt)
                 {
                   $notification=array(
                    'message'=>'Quantity added successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
                 }
                 else
                 {
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);
                 }


        }
        else
        {

        $data=array();
        $data['idd']=$request->id;
        $data['name']=$request->name;
        $data['qty']=$request->qty;
        $data['price']=$request->price;
        $data['code']=$request->code;

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // exit;

         $cart=DB::table('carts')->insert($data);
          if($cart)
                 {
                   $notification=array(
                    'message'=>'Product stored successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
                 }
                 else
                 {
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);
                 }


        }
    

    

    
       }

       public function UpdateCart(Request $request,$id)
       {
          
           $data=array();
           $data['qty']=$request->qty;

           $carts=DB::table('carts')
           ->where('id',$id)
           ->update($data);

            if($carts)
                 {
                   $notification=array(
                    'message'=>'Quantity updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
                 }
                 else
                 {
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);
                 }

       }

       public function CartRemove($id)
       {

        $dlt=DB::table('carts')->where('id',$id)->delete();
        if($dlt)
                 {
                   $notification=array(
                    'message'=>'Update Remove',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);
                 }
                 else
                 {
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);
                 }

       }

       public function invoice(Request $request)
       {
             $validatedata=$request->validate([
            'cus_id'=>'required',
          ],
          [
          'cus_id.required'=>'Select a Customer',  
         
          ]);

             $cusTomer=DB::table('customers')->where('id',$request->cus_id)->first();
             $carts=DB::table('carts')->get();
            
              return view('invoice/invoice',compact('cusTomer','carts'));

       }

       public function FinalInvoice(Request $request)
       {
          $data=array();

          $data['customer_id']=$request->customer_id;
          $data['order_date']=$request->order_date;

          $data['order_status']=$request->order_status;
          $data['total_products']=$request->total_products;
          $data['sub_total']=$request->sub_total;
          $data['vat']=$request->vat;
          $data['total']=$request->total;
          $data['payment_status']=$request->payment_status;
          $data['pay']=$request->pay;
          $data['due']=$request->due;

          // echo "<pre>";
          // print_r($data);
          // echo "</pre>";exit;
         $order_id=DB::table('orders')->insertGetId($data);
          $carts=DB::table('carts')->get();
          $odata=array();
          foreach($carts as $row)
          {
           $odata['order_id']=$order_id;
           $odata['product_id']=$row->id;

           $odata['quantity']=$row->qty;
           $odata['unitcost']=$row->price;
           $odata['total']=$row->qty*$row->price;
           $success=DB::table('orderdetails')->insert($odata);


          }

           if($success)
           {
                 DB::table('carts')->delete();
                   $notification=array(
                    'message'=>'successfully invoice created | Please deliver the product and accepts status',
                    'alert-type'=>'success'
                );

                return redirect()->route('home')->with($notification);
           }
           else
           {
            $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

            return redirect()->back()->with($notification);
           }
       }



}
