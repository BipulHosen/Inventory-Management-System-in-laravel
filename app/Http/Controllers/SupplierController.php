<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Supplier;

class SupplierController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('suppliers/add_supplier');
    }
      //Insert supplier  data.........
    public function Store(Request $request)
    {


    	$validatedata=$request->validate([
    		'name'=>'required|max:255',
    		'email'=>'nullable|unique:suppliers|max:255',
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
    	$data['shop']=$request->shop;
    	$data['accountholder']=$request->accountholder;
    	$data['accountnumber']=$request->accountnumber;
    	$data['bankname']=$request->bankname;
    	$data['branchname']=$request->branchname;
    	$data['city']=$request->city;
    	$data['type']=$request->type;

    	
    	$image=$request->file('photo');
    	


    	if($image)
    	{
    		$image_name=$request->email;
    		
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/supplier/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['photo']=$image_url;
    			 // $employee=DB::table('customers')->insert($data);
                  // $supplier=DB::table('suppliers')->insert($data);
    			$supplier=Supplier::insert($data);

    		
    			 if($supplier)
    			 {
                   $notification=array(
			                    'message'=>'supplier inserted successfully',
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
         // View all suppliers.......
    public function Allsupplier()
    {

         $allsuppliers=Supplier::all();
        return view('suppliers/all_supplier')->with('allsupplier',$allsuppliers);
    }
    // view single customer........
    public function Viewsupplier($id)

    {
         $suppliers=Supplier::findorfail($id);
       

         return view('suppliers/view_supplier')->with('singleSupplier',$suppliers);
    }
       // delete single supplier
    public function Deletesupplier($id)
    {
        $singleRow=Supplier::findorfail($id);

        unlink($singleRow->photo);
        $success=Supplier::findorfail($id)->delete();
        if($success)
       {
          $notification=array(
                        'message'=>'Supplier deleted successfully',
                        'alert-type'=>'success'
                );
         return redirect()->route('all.supplier')->with($notification);
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

    public function Editsupplier($id)
    {
     $editSupplier=Supplier::findorfail($id);

     return view('suppliers/edit_supplier')->with('edit',$editSupplier);
    }

    //update customer............
    public function updatesupplier(Request $request,$id)
    {
       
        $validatedata=$request->validate([
            'name'=>'required|max:255',
            'email'=>'required|max:255',
            'phone'=>'required|max:12',
            'address'=>'required',
            
            'photo'=>'nullable',
            'city'=>'required',
        
        ]);




        $data=array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
    
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;
        $data['type']=$request->type;

        

         // $imagee=$request->file('photo');
        $image=$request->photo;
         // echo $image; exit;


        // $findrow=DB::table('customers')->where('id',$id)->first();


        $findrow=Supplier::findorfail($id);


        // $old_image=$request->file('old_photo');
        


        if($image)
        {
            unlink($findrow->photo);
            $image_name=$id;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            if($success)
            {
                $data['photo']=$image_url;
                
                  

                 $suppliers=Supplier::findorfail($id)->update($data);

                  // $employee=DB::table('employees')->where('id',$id)->update($data);
                    
                   
                 if($suppliers)
                 {
                   $notification=array(
                    'message'=>'supplier Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.supplier')->with($notification);
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

            $photo=Supplier::findorfail($id)->photo;

              $data['photo']=$photo;
             // $customers=DB::table('customers')->where('id',$id)->update($data);
              $suppliers=Supplier::findorfail($id)->update($data);
                    
                   
            if($suppliers)
                 {
                   $notification=array(
                    'message'=>'Supplier Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.supplier')->with($notification);
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
