<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Expenses;
use DB;


class ExpensesController extends Controller
{
    public function add_expense()
    {
    	return view('admin.expens.add');
    }

    public function insert_expense(Request $request)
    {
    	$expense                         = new Expenses();
        $expense->details                = $request->details;
        $expense->amount                 = $request->amount;
        $expense->month                  = $request->month;
        $expense->year                   = $request->year;
        $expense->date                   = $request->date;

       if($expense->save()){
         Session::flash('message','Expenses Successfully Added');
       }
       return redirect()->back();

   }

   
   public function today_expense()
   {
   	   $date = date('m/d/y');

   	   $today = DB::table('expenses')->where('date',$date)->get();

   	    return view('admin.expens.today',compact('today'));

   }

   public function edit_today_expense($id)
   {
   	    $this->data['expense']  = Expenses::find($id);

        return view('admin.expens.edit_expens_today',$this->data);
   }


   public function update_today_expense(Request $request, $id)
   {
   	   $data                       = $request->all();

        $expense                  = Expenses::find($id);
        $expense->details         = $data['details'];
        $expense->amount          = $data['amount'];
        $expense->date            = $data['date'];
        $expense->year             = $data['year'];
        $expense->month             = $data['month'];

       if($expense->save()){
         Session::flash('message','Expenses Successfully Updated');
       }
       return redirect()->route('today.expense');
   }

   public function delete_today_expense($id)
   {
   	  if(Expenses::find($id)->delete())  {
            Session::flash('message', 'Expenses Deleted Successfully');
        }
        return redirect()->back();
   }


  public function monthly_expense()
  {
  	    $month = date('F');

   	    $month = DB::table('expenses')->where('month',$month)->get();
       
   	    return view('admin.expens.month',compact('month'));
  }


 public function januray_expense()
  {
       $month = 'January';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));

  }

  public function february_expense()
  {
       $month = 'February';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

  public function march_expense()
  {
      $month = 'March';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

public function april_expense()
  {
       $month = 'April';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

    public function may_expense()
  {
       $month = 'May';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

public function june_expense()
  {
      $month = 'June';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

public function july_expense()
  {
      $month = 'July';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

public function august_expense()
  {
      $month = 'August';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

public function sepemtember_expense()
  {
      $month = 'September';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }
    public function october_expense()
  {
      $month = 'October';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

 public function november_expense()
  {
      $month = 'November';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }

 public function december_expense()
  {
      $month = 'December';
       $month = DB::table('expenses')->where('month',$month)->get();
       
        return view('admin.expens.month',compact('month'));
  }


public function yearly_expense()
  {
        $year = date('Y');

        $year = DB::table('expenses')->where('year',$year)->get();
       
        return view('admin.expens.year',compact('year'));
  }
  

}
