<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Salary;
use DB;

class SalaryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->data['salary']  = Salary::all();
        //  // dd($this->data['salary']);
        

        $salary = DB::table('salaries')
                ->join('employees','salaries.emp_id','employees.id')
                ->select('salaries.*','employees.name','employees.photo','employees.salary')
                ->orderBy('id','DESC')
                ->get();
       return view('admin.salary.index',compact('salary'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.salary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request,[
        //   'emp_id'                     => 'required',
        //   'month'                      => 'required',
        //   'year'                       => 'required',
        //   'advanced_salary'            => 'required',
        // ]);

        $month =$request->month;
        $emp_id =$request->emp_id;

        $advanced_salary = DB::table('salaries')
                         ->where('month',$month)
                         ->where('emp_id',$emp_id)
                         ->first();

        if($advanced_salary == NULL){
            $salary                           = new Salary();
            $salary->emp_id                   = $request->emp_id;
            $salary->month                    = $request->month;
            $salary->year                     = $request->year;
            $salary->advanced_salary          = $request->advanced_salary;

           if($salary->save()){
             Session::flash('message','Salary Successfully Added');
           }
           return redirect()->route('salary.index');
        }else{
             Session::flash('message','Salary Already Paid');
        }
         return redirect()->back();
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
