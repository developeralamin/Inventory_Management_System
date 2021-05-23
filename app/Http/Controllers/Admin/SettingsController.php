<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Settings;
use App\Models\Attendance;
use DB;

class SettingsController extends Controller
{
    public function setting()
    {
    	$setting = DB::table('settings')->first();
   	    return view('admin.setting.setting',compact('setting'));
   
    }

    public function update_setting(Request $request, $id)
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
          // 'company_logo'                     => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

    	   // $image = $request->file('company_logo');
        // // $slug = str_slug($request->title);
        // if (isset($image))
        // {
        //     $currentDate = Carbon::now()->toDateString();
        //     $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
        //     if (!file_exists('uploads/setting'))
        //     {
        //         mkdir('uploads/setting', 0777 , true);
        //     }
        //     $image->move('uploads/setting',$imagename);
        // }else {
        //     $imagename = 'dafault.png';
        // }
         $data                                    = $request->all();

        $setting                                   = new Settings();
        $setting->company_name                     = $data['company_name'];
        $setting->company_address                  = $data['company_address'];
        $setting->company_email                    = $data['company_email'];
        $setting->company_phone                    = $data['company_phone'];
        $setting->company_mobile                   = $data['company_mobile'];
        $setting->company_city                     = $data['company_city'];
        $setting->company_country                  = $data['company_country'];
        $setting->company_zipcode                  = $data['company_zipcode'];
        // $setting->company_logo                     = $imagename;
       if($setting->save()){
         Session::flash('message','Company Informations Successfully Added');
       }
       return redirect()->back();
    }

    
}
