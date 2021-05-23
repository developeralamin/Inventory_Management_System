<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Employee;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['employee']   = Employee::all();
        return view('admin.employee.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
          'name'                     => 'required',
          'email'                    => 'required|email|unique:employees',
          'phone'                    => 'required|unique:employees',
          'address'                  => 'required',
          'experience'               => 'required',
          'nid_no'                   => 'required|unique:employees',
          'vacation'                 => 'required',
          'city'                     => 'required',
          'salary'                   => 'required',
          'photo'                    => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('photo');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/employee'))
            {
                mkdir('uploads/employee', 0777 , true);
            }
            $image->move('uploads/employee',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $employee                         = new Employee();
        $employee->name                   = $request->name;
        $employee->email                  = $request->email;
        $employee->phone                  = $request->phone;
        $employee->address                = $request->address;
        $employee->experience             = $request->experience;
        $employee->nid_no                 = $request->nid_no;
        $employee->vacation               = $request->vacation;
        $employee->city                   = $request->city;
        $employee->salary                 = $request->salary;
        $employee->photo                  = $imagename;
       if($employee->save()){
         Session::flash('message','Employee Successfully Added');
       }
       return redirect()->route('employee.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $this->data['employee']  = Employee::findOrFail($id);
         return view('admin.employee.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['employee']  = Employee::find($id);
         return view('admin.employee.edit',$this->data);
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
         $this->validate($request,[
          'name'                     => 'required',
          // 'email'                    => 'required|email|unique:employees',
          'phone'                    => 'required',
          'address'                  => 'required',
          'experience'               => 'required',
          'nid_no'                   => 'required',
          'vacation'                 => 'required',
          'city'                     => 'required',
          'salary'                   => 'required',
          // 'photo'                    => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);


         $data                                  = $request->all();

         $employee                              = Employee::find($id);
         $employee->name                        = $data['name'];
         $employee->phone                       = $data['phone'];
         $employee->address                     = $data['address'];
         $employee->experience                  = $data['experience'];
         $employee->nid_no                      = $data['nid_no'];
         $employee->vacation                    = $data['vacation'];
         $employee->city                        = $data['city'];
         $employee->salary                      = $data['salary'];

         if($employee->save() ){
            Session::flash('message','Employee Update Successfully');
         }

         return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $employee = Employee::find($id);
        if (file_exists('uploads/employee/'.$employee->photo))
        {
            unlink('uploads/employee/'.$employee->photo);
        }
       if($employee->delete() ){
            Session::flash('message','Employee Successfully Deleted');
       }
        return redirect()->back();
    }
}
