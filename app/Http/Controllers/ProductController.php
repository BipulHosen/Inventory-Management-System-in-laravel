<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Product;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;



class ProductController extends Controller
{
       
     public function __construct()
	    {
	        $this->middleware('auth');
	    }
	    public function AddProduct()
	    {

	    	return view('product/add_product');
	    }
    public function AllProduct()
	    {

          $allproducts=DB::table('products')->get();
	    	return view('product/all_product')->with('allproducts',$allproducts);
	    }

	    public function InsertProduct(Request $request)
	    {
	    

	    	$validatedata=$request->validate([
    		'product_name'=>'required|unique:products|max:255',
    		'product_code'=>'required|unique:products',
    		
    	     ]);

	        $data=array();
	    	$data['cat_id']=$request->cat_id;
	    	$data['sup_id']=$request->sup_id;
	    	$data['product_code']=$request->product_code;
	    	$data['product_name']=$request->product_name;
	    	$data['product_route']=$request->product_route;
	    	$data['product_garage']=$request->product_garage;
	    	$data['buy_date']=$request->buy_date;
	    	$data['expire_date']=$request->expire_date;
	    	$data['buying_price']=$request->buying_price;
	    	$data['selling_price']=$request->selling_price;



	    	$image=$request->file('photo');

    	
    	if($image)
    	{
    		$image_name=$request->product_code;
    		
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/product/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['product_image']=$image_url;
    			 $products=DB::table('products')->insert($data);
    			 if($products)
    			 {
                   $notification=array(
                    'message'=>'Product inserted successfully',
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
    		else
    		{
              return redirect()->back();
    		}

    		
    	}

	    }

        public function DeleteProduct($id)
        {

        $dlt=DB::table('products')->where('id',$id)->delete();
        if($dlt)
                 {
                   $notification=array(
                    'message'=>'Product deleted successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.product')->with($notification);
                 }
                 else
                 {
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);
                 }

        }
        public function EditProduct($id)
        {
            $sngProduct=DB::table('products')->where('id',$id)->first();
            return view('product/edit_product')->with('editProduct',$sngProduct);
        }
        public function UpdateProduct(Request $request,$id)
        {

            $validatedata=$request->validate([
            'product_name'=>'required|max:255',
            'product_code'=>'required',
            
             ]);

            $data=array();
            $data['cat_id']=$request->cat_id;
            $data['sup_id']=$request->sup_id;
            $data['product_code']=$request->product_code;
            $data['product_name']=$request->product_name;
            $data['product_route']=$request->product_route;
            $data['product_garage']=$request->product_garage;
            $data['buy_date']=$request->buy_date;
            $data['expire_date']=$request->expire_date;
            $data['buying_price']=$request->buying_price;
            $data['selling_price']=$request->selling_price;



           $image=$request->file('product_image');
        // $image=$request->product_image;
        // echo $image;exit;
         // echo $image; exit;


        // $findrow=DB::table('customers')->where('id',$id)->first();


    $findrow=DB::table('products')->where('id',$id)->first();


        // $old_image=$request->file('old_photo');
        


        if($image)
        {
            unlink($findrow->product_image);
            $image_name=$id;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/product/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            if($success)
            {
                $data['product_image']=$image_url;
                
                  

                 $products=DB::table('products')->where('id',$id)->update($data);

                  // $employee=DB::table('employees')->where('id',$id)->update($data);
                    
                   
                 if($products)
                 {
                   $notification=array(
                    'message'=>'Product Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.product')->with($notification);
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
              return redirect()->back();
            }

            
        }
        else
        {
              // $photo=DB::table('customers')
              // ->where('id',$id)
              // ->first()
              // ->photo;

            $photo=$request->old_image;


              $data['product_image']=$photo;
             // $customers=DB::table('customers')->where('id',$id)->update($data);
              $products=DB::table('products')->where('id',$id)->update($data);
                    
                   
                 if($products)
                 {
                   $notification=array(
                    'message'=>'Customer Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.product')->with($notification);
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

        public function ViewProduct($id)
        {
            // $product=DB::table('products')->where('id',$id)->first();

           
            $products=DB::table('products')->join('categories','products.cat_id','categories.id')
            ->join('suppliers','products.sup_id','suppliers.id')
            ->select('products.*','categories.cat_name','suppliers.name')
            ->where('products.id',$id)
            ->first();
            
             return view('product/view_product')->with('vproduct',$products);
        }
          //import and export functions are here

            public function export()
            {

              return Excel::download(new ProductsExport,'products.xlsx');
            }

            public function ImportProduct()
            {


                   return view('importexport/import_product');
            }


            public function import(Request $request)
            {
                   $import=Excel::import(new ProductsImport,$request->import_file);
                   if($import)
                 {
                   $notification=array(
                    'message'=>'Import file successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.product')->with($notification);
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
