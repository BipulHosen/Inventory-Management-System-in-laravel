<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    //
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddCategory()
    {
     return view('category/add_category');
    }
   

   public function InsertCategory(Request $request)
    {
    	$data=array();
    	$data['cat_name']=$request->cat_name;
    	$category=DB::table('categories')->insert($data);
    	 if($category)
    			 {
                   $notification=array(
                    'message'=>'Category inserted successfully',
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


    public function AllCategory()
    {
    	$category=DB::table('categories')->get();
     return view('category/all_category')->with('category',$category);
    }

    public function DeleteCategory($id)
    {
    	$delete=DB::table('categories')->where('id',$id)->delete();
    	 if($delete)
    			 {
                   $notification=array(
                    'message'=>'Category deleted successfully',
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
    public function EditCategory($id)
    {
         $edit=DB::table('categories')->where('id',$id)->first();
    	return view('category/edit_category')->with('edit',$edit);
    }
    public function UpdateCategory(Request $request,$id)
    {

    	
    	$data=array();
    	$data['cat_name']=$request->cat_name;
    	$upd=DB::table('categories')->where('id',$id)->update($data);
    	if($upd)
    			 {
                   $notification=array(
                    'message'=>'Category updated successfully',
                    'alert-type'=>'success'
                );
                return redirect()->route('all.category')->with($notification);
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
