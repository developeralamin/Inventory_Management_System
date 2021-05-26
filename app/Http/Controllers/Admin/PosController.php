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
}
