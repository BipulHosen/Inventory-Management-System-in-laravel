<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AttendenceController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function TakeAttendence()
    {
    	$employees=DB::table('employees')->get();
    	return view('attendence/take_attendence')->with('attendebce',$employees);
    }

    public function AllAttendence()
    {
    	$all_att=DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();

        return view('attendence/all_attendence')->with('allattendence',$all_att);
    }

    public function InsertAttendence(Request $request)
     {   


     $attd=DB::table('attendences')->where('att_date',$request->att_date)->first();
        if($attd)
        {
           $notification=array(
                    'message'=>'already attendence taken',
                    'alert-type'=>'error');

    			 	return redirect()->back()->with($notification);
        }
        else
        {
        
             foreach($request->user_id as $id)
                   {
        

            	$data[]=[
	               "user_id"=>$id,
	               "attendence"=>$request->attendence[$id],
	               "att_date"=>$request->att_date,
	               "att_year"=>$request->att_year,
                   "month"=>$request->month,
	               "edit_date"=>date('d_m_y'),
     	              ];
                }
    
		        $success=DB::table('attendences')->insert($data);
		        	if($success)
		    		{
		    			
		    			
		                   $notification=array(
		                    'message'=>'Attendence inserted successfully',
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
    public function EditAttendence($edit_date)
    {
        $allAttendences=DB::table('attendences')
        ->join('employees','attendences.user_id','employees.id')
        ->select('employees.name','employees.photo','attendences.*')
        ->where('edit_date',$edit_date)
        ->get();

         $date=DB::table('attendences')->where('edit_date',$edit_date)->first();

        $data['allAttendences']=$allAttendences;
        $data['edit_date']=$edit_date;
         $data['date']=$date;
         // echo "<pre>";
         // print_r($data);
         // echo "</pre>";

         
        return view('attendence/edit_attendence',$data);
    }

    public function UpdateAttendence(Request $request,$edit_date)
    {
        global $success;

      foreach($request->id as $id)
      {
         
        if($request->attendence[$id]==$request->org_attendence[$id])
        {
        
           
        }
        else
        {
           
             $data=array();
         $data['user_id']=$id;
         $data['attendence']=$request->attendence[$id];
         // $data['att_date']=$request->att_date;
         // $data['att_year']=$request->att_year;
         // $data['edit_date']=$edit_date;
         // $data['month']=$request->month;

         // echo $id." ".$edit_date;



         $success=DB::table('attendences')
         ->where('edit_date',$edit_date)
         ->where('user_id',$id)
         ->update($data);
         

        }
       
         
         
      }
     


      if($success)
          {
               
           $notification=array(
                'message'=>'Attendence Updated successfully',
                'alert-type'=>'success'
            );
            return redirect()->route('all.attendence')->with($notification);
          }

         else
         {
             $notification=array(
        'message'=>'Attendence Updated  successfully but nothing change',
        'alert-type'=>'error');

       return redirect()->route('all.attendence')->with($notification);
         }

    }

    public function DeleteAttendence($edit_date)
    {
     

         $success=DB::table('attendences')->where('edit_date',$edit_date)->delete();

        if($success)
       {
          $notification=array(
                        'message'=>'Attendence deleted successfully',
                        'alert-type'=>'success'
                );
         return redirect()->route('all.attendence')->with($notification);
       }
       else
       {
         $notification=array(
                        'message'=>'error',
                        'alert-type'=>'success');

        return redirect()->back()->with($notification);

       }

 
    }

    public function ViewAttendence($edit_date)
    {

         $allAttendences=DB::table('attendences')
        ->join('employees','attendences.user_id','employees.id')
        ->select('attendences.*','employees.name','employees.photo')
        ->where('edit_date',$edit_date)
        ->get();

         $date=DB::table('attendences')->where('edit_date',$edit_date)->first();

        // $data['allAttendences']=$allAttendences;
        // $data['edit_date']=$edit_date;
        //  $data['date']=$date;
         return view('attendence/view_attendence',compact('allAttendences','date'));

    }


    public function MonthlyAttendence()
    {
       


         $allAttendences=DB::table('attendences')
        ->join('employees','attendences.user_id','employees.id')
        ->select('attendences.*','employees.name','employees.photo')
        ->where('month',date('F'))
        ->get();
        $month=date('F');
        return view('attendence/monthly_attendence',compact('allAttendences','month'));

    }

    public function singleMonthAttendence($month)
    {
       $allAttendences=DB::table('attendences')
                      ->join('employees','attendences.user_id','employees.id')
                      ->select('attendences.*','employees.name','employees.photo')
                      ->where('month',$month)
                      ->get();
                      $month=$month;
        return view('attendence/monthly_attendence',compact('allAttendences','month'));
    }



    public function Setting()
    {
    	$settings=DB::table('settings')->first();
        return view('setting/setting_company',compact('settings'));
    }

    public function UpdateSetting(Request $request,$id)
    {


       $data=array();

        $data['company_name']=$request->company_name;
        $data['company_email']=$request->company_email;
        $data['company_phone']=$request->company_phone;
    
        $data['company_address']=$request->company_address;
        $data['company_mobile']=$request->company_mobile;
        $data['company_zipcode']=$request->company_zipcode;
        $data['company_country']=$request->company_country;
        
        $data['company_city']=$request->company_city;

        

         // $imagee=$request->file('photo');
        $image=$request->company_logo;
         // echo $image; exit;


        $findrow=DB::table('settings')->where('id',$id)->first();


        // $old_image=$request->file('old_photo');
        


        if($image)
        {
            unlink($findrow->company_logo);
            $image_name=$request->email;
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/comapny/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);


            if($success)
            {
                $data['company_logo']=$image_url;
                
                  

                 $settings=DB::table('settings')->where('id',$id)->update($data);
                    
                   
                 if($settings)
                 {
                   $notification=array(
                    'message'=>'Settings Updated successfully',
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
              return redirect()->back();
            }

            
        }
        else
        {
              // $photo=DB::table('settings')
              // ->where('id',$id)
              // ->first()
              // ->company_logo;
              $data['company_logo']=$request->old_photo;
             $settings=DB::table('settings')->where('id',$id)->update($data);
                    
                   
                 if($settings)
                 {
                   $notification=array(
                    'message'=>'Data Updated successfully',
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
}
