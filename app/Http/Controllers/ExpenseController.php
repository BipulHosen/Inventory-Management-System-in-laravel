<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
{
    //
     public function __construct()
	    {
	        $this->middleware('auth');
	    }

	    public function AddExpense()
	    {
	    	return view('expense/add_expense');
	    }
	    public function InsertExpense(Request $request)
	    {

	    	$data=array();
	    	$data['details']=$request->detail;
	    	$data['amount']=$request->amount;
	    	$data['date']=$request->date;
	    	$data['month']=$request->month;
            $data['year']=$request->year;
	    		 $expense=DB::table('expenses')->insert($data);
    			 if($expense)
    			 {
                   $notification=array(
                    'message'=>'Expense inserted successfully',
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
	    public function TodaysExpense()
	    {
	    	$currentdate=date("d/m/y");

	    	$curntdata=DB::table('expenses')->where('date',$currentdate)->get();
	    
	    	return view('expense/todays_expense')->with('curntdata',$curntdata);

	    }
	    public function deleteExpense($id)
	    {
	    	  $dlt=DB::table('expenses')->where('id',$id)->delete();
        if($dlt)
                 {
                   $notification=array(
                    'message'=>'Expense deleted successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('todays.expense')->with($notification);
                 }
                 else
                 {
                    $notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

                    return redirect()->back()->with($notification);
                 }
	    }

	    public function EditExpense($id)
	    {

            $edt=DB::table('expenses')->where('id',$id)->first();

            return view('expense/edit_expense')->with('edt',$edt);
	    }
	    public function UpdateExpense(Request $request,$id)
	    {
	    	$data=array();
	    	$data['details']=$request->details;
	    	$data['amount']=$request->amount;
	        $success=DB::table('expenses')->where('id',$id)->update($data);

	    
    			
    			 if($success)
    			 {
                   $notification=array(
                    'message'=>'Expense updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('todays.expense')->with($notification);
    			 }
    			 else
    			 {
    			 	$notification=array(
                    'message'=>'error',
                    'alert-type'=>'success');

    			 	return redirect()->back()->with($notification);
    			 }
    	
    		


	    }
	    public function MonthExpense()
	    {
             $month=date("F");
	       	 $alldata=DB::table('expenses')->where('month',date("F"))->get();
              $data['curntdata']=$alldata;
              $data['month']=$month;

	    	return view('expense/month_expense',$data);
	    }
        public function YearlyExpense()
        {
            $allyearsdata=DB::table('expenses')->where('year',date("Y"))->get();
        
            return view('expense/yearly_expense')->with('allyearsdata',$allyearsdata);
        }
        public function singleMonthExpense($month)
        {
          

          $januData=DB::table('expenses')->where('month',$month)->get();
          // echo "<pre>";
          // print_r($januData);
          // echo "</pre>";
          $data['curntdata']=$januData;
          $data['month']=$month;
          return view('expense/month_expense',$data);
        }
}
