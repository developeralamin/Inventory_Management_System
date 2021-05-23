<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Attendance;
use DB;

class SettingsController extends Controller
{
    public function setting()
    {
    	$setting = DB::table('settings')->first();
   	    return view('admin.setting.setting',compact('setting'));
   
    }

    public function update_setting(Request $request)
    {
    	 $this->validate($request,[
          'company_name'                     => 'required',
          'company_address'                  => 'required',
          'company_email'                    => 'required',
          'company_phone'                    => 'required',
          'company_mobile'                   => 'required',
          'company_city'                     => 'required',
          'company_country'                  => 'required',
          'company_zipcode'                  => 'required',
        'company_logo'                     => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

    	 return $request->all();
    }
}
