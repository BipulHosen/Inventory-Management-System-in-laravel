<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddAdvancedSalary()
    {

    	return view('salary/advanced_salary');
    }
    public function Allsalary()
    {
         $salary=DB::table('advance_salaries')
         ->join('employees','advance_salaries.emp_id','employees.id')
         ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
         ->orderBy('id','DESC')
         ->get();
        

    	return view('salary/all_advanced_salary')->with('advanced',$salary);
    }

    public function InsertAdvancedsalary(Request $request)
    {

    	  $month=$request->month;
    	  $emp_id=$request->emp_id;
    	  $advanced=DB::table('advance_salaries')
    	  ->where('emp_id',$emp_id)
    	  ->where('month',$month)
    	  ->first();

    	  if($advanced===NULL)
    	  {
    	  	$data=array();
    	$data['emp_id']=$request->emp_id;
    	$data['month']=$request->month;
    	$data['advanced_salary']=$request->advanced_salary;
    	$data['year']=$request->year;
    	

    	 $advanced=DB::table('advance_salaries')->insert($data);
    			 if($advanced)
    			 {
                   $notification=array(
                    'message'=>'Salary inserted successfully',
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
    	  	$notification=array(
                    'message'=>'All ready advanced paid in this month',
                    'alert-type'=>'error');

    			 	return redirect()->back()->with($notification);
    	  }
    	 
    
    	
    }
    public function PaySalary()
    {
    	
        
        $month=date("F",strtotime('+6 month'));
     

        $salary=DB::table('advance_salaries')
         ->join('employees','advance_salaries.emp_id','employees.id')
         ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
         ->where('month',$month)
         ->get();

         return view('salary/pay_salary')->with('salary',$salary);

    }
}
