<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Paid_Salary;
use App\Models\Employee;
use DB;


class PaidSalaryController extends Controller
{
    public function pay_salary()
    {
    	 // $month = date('F',strtotime('month'));

      //   $salary = DB::table('salaries')
      //           ->join('employees','salaries.emp_id','employees.id')
      //           ->select('salaries.*','employees.name','employees.photo','employees.salary')
      //           ->where('month',$month)
      //           ->get();
      //         echo "<pre>";
      //         print_r($salary);
      //         exit();
       // return view('admin.salary.pay_salary',compact('salary'));
    	// return view('admin.salary.pay_salary');

    	 $salary = DB::table('employees')->get();
           
       return view('admin.salary.pay_salary',compact('salary'));
    }
}
