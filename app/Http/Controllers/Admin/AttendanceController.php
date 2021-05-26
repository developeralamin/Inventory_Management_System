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


class AttendanceController extends Controller
{
    public function take_attendance()
    {

   	   $employee = DB::table('employees')->get();
   	    return view('admin.attendance.add',compact('employee'));
    }

    public function insert_attendance(Request $request)
    {

      $date = $request->att_date;

      $attn_date = DB::table('attendances')->where('att_date',$date)->first();

      if ($attn_date) {
      	
      	Session::flash('error_message','Opps! Attendance Already Take Today!');
      	return redirect()->back();

      }else{
      	foreach ($request->user_id as $id) {

    		$data[]=[
    			'user_id' => $id,
    			'attendance' => $request->attendance[$id],
    			'att_date'   => $request->att_date,
    			'att_year'   => $request->att_year,
    			'month'      => $request->month,
    			'edit_date'  => date('m-d-y'),


    		];
    	}

    	$atten = DB::table('attendances')->insert($data);

    	if($atten){
    		Session::flash('message','Take Attendance Successfull');
    	}
    	return redirect()->back();
      }
    
    	// $data= array();
    	// $data['att_date'] = $request->att_date;
    	// $data['att_year'] = $request->att_year;
      
     //    print_r($data);

    }

    public function all_attendance()
    {
    	$all_atendnece = DB::table('attendances')->select('edit_date')->groupBy('edit_date')->get();

   	    return view('admin.attendance.all_atendance',compact('all_atendnece'));
   	    
    }

    public function edit_attendance($edit_date)
    {

    $date = DB::table('attendances')->where('edit_date',$edit_date)->first();

        $employee = DB::table('attendances')->join('employees',
        'attendances.user_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();
      	

     // print_r($edit_date);
      return view('admin.attendance.edit_attendance',compact('employee','date'));
    }



    public function update_attendance(Request $request)
    {
    	 foreach ($request->id as $id) {

    		$data=[
    			'attendance' => $request->attendance[$id],
    			'att_date'   => $request->att_date,
    			'att_year'   => $request->att_year,
    			'month'       => $request->month,
    		];

  $attendance=Attendance::where(['att_date' =>$request->att_date,'id'=>$id])->first();
    
    $attendance->update($data);

    	}

    	if($attendance){
    		Session::flash('message','Attendance Updated Successfully');
    	}
    	return redirect()->route('all.attendance');
    }


   
   public function view_attendance($edit_date)
   {
   	      $date = DB::table('attendances')->where('edit_date',$edit_date)->first();

        $employee = DB::table('attendances')->join('employees',
        'attendances.user_id','employees.id')->select('employees.name','employees.photo','attendances.*')->where('edit_date',$edit_date)->get();
  
     // print_r($edit_date);
      return view('admin.attendance.view_attendance',compact('employee','date'));
   }




}
