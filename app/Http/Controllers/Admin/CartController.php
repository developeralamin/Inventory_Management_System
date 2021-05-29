<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Customer;
use DB;
use Cart;


class CartController extends Controller
{
    public function add_cart(Request $request)
    {
    	$data = array();

    	$data['id']      = $request->id;
    	$data['name']    = $request->name;
    	$data['qty']     = $request->qty;
    	$data['price']   = $request->price;
    	// $data['weight']   = $request->weight;

    	$add_pro=Cart::add($data);
    	if($add_pro){
    		Session::flash('message','Product Add');
    	}
    	return redirect()->back();
    }

  public function cart_update(Request $request,$rowId)
  {
  	   $qty=$request->qty;
  	   $update=Cart::update($rowId, $qty); // Will update the quantity

  	   if($update){
  	   	Session::flash('message','Update Successfull');
  	   }
  	   return redirect()->back();
  }

public function cart_remove($rowId)
	{
		$remove = Cart::remove($rowId);

		if($remove){
			Session::flash('message','Product Delete');
		}
		return redirect()->back();
	}


  public function cart_invoice(Request $request)
  {
  	$this->validate($request,[
          'cus_id'  => 'required',
         ],
         [
         	'cus_id.required' => 'Select a Customer First !',
        ]);

  	 $cus_id = $request->cus_id;
  	 $customer=DB::table('customers')->where('id',$cus_id)->first();
     $contents = Cart::content();
     
     return view('admin.pos.invoice',compact('customer','contents'));
  }

   
   public function final_invoice(Request $request)
   {
   	  $data = array();

    	$data['customer_id']      = $request->customer_id;
    	$data['order_date']       = $request->order_date;
    	$data['order_status']     = $request->order_status;
    	$data['total_product']    = $request->total_product;
    	$data['subtotal']         = $request->subtotal;
    	$data['vat']              = $request->vat;
    	$data['total']            = $request->total;
    	$data['payment_status']   = $request->payment_status;
    	$data['total_product']    = $request->total_product;
    	$data['pay']              = $request->pay;
    	$data['due']              = $request->due;
    	
    	 $order_id=DB::table('orders')->insertGetId($data);
    	 $contents=Cart::content();
         $showdata=array();

    foreach ($contents as $content) {
       	 $showdata['order_id']      = $order_id;
       	 $showdata['product_id']    = $content->id;
       	 $showdata['quantity']      = $content->qty;
       	 $showdata['unitcost']      = $content->price;
       	 $showdata['total']         = $content->total;

       	 $insert=DB::table('order_details')->insert($showdata);
       }

       if($insert){
       	Session::flash('message','Successfull Invoice Create ! Please delever the products and accept status');
       }
       return redirect()->route('pending_order');
   }
  

}
