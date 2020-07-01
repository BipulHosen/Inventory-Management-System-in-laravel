<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Customer;

class CustomerController extends Controller
{
    //
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('customers/add_customer');
    }
      //Insert Customers data.........
    public function Store(Request $request)
    {
    	


    	$validatedata=$request->validate([
    		'name'=>'required|max:255',
    		'email'=>'nullable|unique:customers|max:255',
    		'phone'=>'required|max:12',
    		'address'=>'required',
    		
    		'photo'=>'nullable',
    		'city'=>'nullable',
    	
    	]);


    	

   
    	$data=array();
    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    	$data['address']=$request->address;
    	$data['shopname']=$request->shopname;
    	$data['account_holder']=$request->account_holder;
    	$data['account_number']=$request->account_number;
    	$data['bank_name']=$request->bank_name;
    	$data['bank_branch']=$request->bank_branch;
    	$data['city']=$request->city;
    	$image=$request->file('photo');
    	


    	if($image)
    	{
    		$image_name=rand(50000,0);
    		
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/customer/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['photo']=$image_url;
    			 $employee=DB::table('customers')->insert($data);
    			 if($employee)
    			 {
                   $notification=array(
                    'message'=>'Data inserted successfully',
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
         // View all Customers.......
    public function AllCustomer()
    {

         $allcustomer=Customer::all();
        return view('customers/all_customer')->with('allCustomer',$allcustomer);
    }
    // view single customer........
    public function ViewCustomer($id)

    {
         $customers=Customer::findorfail($id);
       

         return view('customers/view_customer')->with('singleCustomer',$customers);
    }
       // delete single customer
    public function DeleteCustomer($id)
    {
        $singleRow=Customer::findorfail($id);

        unlink($singleRow->photo);
        $success=Customer::findorfail($id)->delete();
        if($success)
       {
          $notification=array(
                        'message'=>'Customer deleted successfully',
                        'alert-type'=>'success'
                );
         return redirect()->route('all.customer')->with($notification);
       }
       else
       {
         $notification=array(
                        'message'=>'error',
                        'alert-type'=>'success');

        return redirect()->back()->with($notification);

       }

    }
   //delete single customer

    public function EditCustomer($id)
    {
     $editCustomer=Customer::findorfail($id);

     return view('customers/edit_customer')->with('edit',$editCustomer);
    }

    //update customer............
    public function updateCustomer(Request $request,$id)
    {
       
        $validatedata=$request->validate([
            'name'=>'required|max:255',
            'email'=>'nullable|max:255',
            'phone'=>'required|max:12',
            'address'=>'required',
            
            'photo'=>'nullable',
            'city'=>'nullable',
        
        ]);




        $data=array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
    
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        

         // $imagee=$request->file('photo');
        $image=$request->photo;
         // echo $image; exit;


        // $findrow=DB::table('customers')->where('id',$id)->first();


        $findrow=Customer::findorfail($id);


        // $old_image=$request->file('old_photo');
        


        if($image)
        {
            unlink($findrow->photo);
            $image_name=$id;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            if($success)
            {
                $data['photo']=$image_url;
                
                  

                 $customers=Customer::findorfail($id)->update($data);

                  // $employee=DB::table('employees')->where('id',$id)->update($data);
                    
                   
                 if($customers)
                 {
                   $notification=array(
                    'message'=>'Data Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.customer')->with($notification);
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

            $photo=Customer::findorfail($id)->photo;

              $data['photo']=$photo;
             // $customers=DB::table('customers')->where('id',$id)->update($data);
              $customers=Customer::findorfail($id)->update($data);
                    
                   
                 if($customers)
                 {
                   $notification=array(
                    'message'=>'Customer Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.customer')->with($notification);
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
    

}
