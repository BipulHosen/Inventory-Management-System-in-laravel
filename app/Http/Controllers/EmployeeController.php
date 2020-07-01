<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Employee;

class EmployeeController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('add_employee');
    }

    public function store(Request $request)
    {
           
    	   $validatedata=$request->validate([
    		'name'=>'required|max:255',
    		'email'=>'required|unique:employees|max:255',
    		'phone'=>'required|max:12',
    		'address'=>'required',
    		'nid_no'=>'required|unique:employees|max:255',
    		'photo'=>'required',
    		'salary'=>'required',
    	
    	]);

   
    	$data=array();

    	$data['name']=$request->name;
    	$data['email']=$request->email;
    	$data['phone']=$request->phone;
    
    	$data['address']=$request->address;
    	$data['nid_no']=$request->nid_no;
    	$data['salary']=$request->salary;
    	$data['experience']=$request->experience;
    	$data['vacation']=$request->vacation;
    	$data['city']=$request->city;
    	$image=$request->file('photo');
    	


    	if($image)
    	{
    		$image_name=$request->email;
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='public/employee/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success)
    		{
    			$data['photo']=$image_url;
    			 $employee=DB::table('employees')->insert($data);
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
    public function AllEmployee()
    {
        // $data=Employee::all();
        $data=DB::table('employees')->get();
    	return view('all_employee')->with('employee',$data);
    }

    public function Employeedelete($id)
    {
       // $success=DB::table('employees')->where('id',$id)->delete();
        $single=Employee::findorfail($id);
         unlink($single->photo);
        $success=Employee::findorfail($id)->delete();
       if($success)
       {
          $notification=array(
                    'message'=>'Data deleted successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.employee')->with($notification);
       }
       else
       {
         $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);

       }
    }

    public function EmployeeEdit($id)
    {
        // $employeeEdit=Employee::findorfail($id);
        $employeeEdit=DB::table('employees')->where('id',$id)->first();
        return view('edit_employee')->with('edit',$employeeEdit);



    }

    public function EmployeeUpdate(Request $request,$id)
    {
     
   
        $data=array();

        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
    
        $data['address']=$request->address;
        $data['nid_no']=$request->nid_no;
        $data['salary']=$request->salary;
        $data['experience']=$request->experience;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;

        

         // $imagee=$request->file('photo');
        $image=$request->photo;
         // echo $image; exit;


        $findrow=DB::table('employees')->where('id',$id)->first();


        // $old_image=$request->file('old_photo');
        


        if($image)
        {
            unlink($findrow->photo);
            $image_name=$request->email;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            if($success)
            {
                $data['photo']=$image_url;
                
                  

                 $employee=DB::table('employees')->where('id',$id)->update($data);
                    
                   
                 if($employee)
                 {
                   $notification=array(
                    'message'=>'Data Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.employee')->with($notification);
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
              $photo=DB::table('employees')
              ->where('id',$id)
              ->first()
              ->photo;
              $data['photo']=$photo;
             $employee=DB::table('employees')->where('id',$id)->update($data);
                    
                   
                 if($employee)
                 {
                   $notification=array(
                    'message'=>'Data Updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.employee')->with($notification);
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
