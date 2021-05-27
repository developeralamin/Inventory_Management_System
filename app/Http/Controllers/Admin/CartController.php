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

}
