<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Customer;
use DB;

class PosController extends Controller
{
    public function pos()
    {
    	   //    $employee = DB::table('attendances')->join('employees',
        // 'attendances.user_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();

    	$product = DB::table('products')
    	         ->join('categories','products.cat_id','categories.id')
    	         ->select('categories.category_name','products.*')
    	         ->get();
    	$customer = DB::table('customers')->get();
    	$categories = DB::table('categories')->get();

    	return view('admin.pos.index',compact('product','customer','categories'));
    }

    public function pending_order()
    {
        $order=DB::table('orders')
              ->join('customers','orders.customer_id','customers.id')
              ->select('customers.name','orders.*')
              ->where('order_status','pending')
              ->get();

        return view('admin.order.pending_order',compact('order'));
    }


  public function view_order_status($id)
  {
       $order=DB::table('orders')
              ->join('customers','orders.customer_id','customers.id')
              // ->select('customers.name','orders.*')
              ->where('orders.id',$id)
              ->first();

         $order_details=DB::table('order_details')
                       ->join('products','order_details.product_id','products.id')
                       ->select('products.product_name','products.product_code','order_details.*')
                       ->where('order_id',$id) 
                       ->get();   
  return view('admin.order.order_confirmation',compact('order','order_details')) ;


  }

    public function pos_done($id)
    {
       $approve=DB::table('orders')
               ->where('id',$id)
               ->update(['order_status'=>'success']);
    
       return redirect()->route('success_order');
    }



    public function success_order()
    {
         $success_order=DB::table('orders')
              ->join('customers','orders.customer_id','customers.id')
              ->select('customers.name','orders.*')
              ->where('order_status','success')
              ->get();

        return view('admin.order.success_order',compact('success_order'));
    }

}
