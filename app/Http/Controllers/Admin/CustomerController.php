<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Customer;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['customer']  = Customer::all();
        return view('admin.customer.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.create');
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
          // 'email'                    => 'required|email|unique:customers',
          'phone'                    => 'required|unique:customers',
          'address'                  => 'required',
          'city'                     => 'required',
          'photo'                    => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

       $image = $request->file('photo');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/customer'))
            {
                mkdir('uploads/customer', 0777 , true);
            }
            $image->move('uploads/customer',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $customer                         = new Customer();
        $customer->name                   = $request->name;
        $customer->email                  = $request->email;
        $customer->phone                  = $request->phone;
        $customer->address                = $request->address;
        $customer->shopname               = $request->shopname;
        $customer->acount_holder          = $request->acount_holder;
        $customer->acount_number          = $request->acount_number;
        $customer->bank_name              = $request->bank_name;
        $customer->bank_branch            = $request->bank_branch;
        $customer->city                   = $request->city;
        $customer->photo                  = $imagename;
       if($customer->save()){
         Session::flash('message','Customer Successfully Added');
       }
       return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['customer']  = Customer::findOrFail($id);
         return view('admin.customer.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $this->data['customer']  = Customer::find($id);
         return view('admin.customer.edit',$this->data);
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
          'bank_branch'              => 'required',
          'bank_name'                => 'required',
          'acount_number'            => 'required',
          'acount_holder'            => 'required',
          'city'                     => 'required',
         
        ]);


         $data                            = $request->all();

         $customer                        = Customer::find($id);
        $customer->name                   = $request->name;
        // $customer->email                  = $request->email;
        $customer->phone                  = $request->phone;
        $customer->address                = $request->address;
        $customer->shopname               = $request->shopname;
        $customer->acount_holder          = $request->acount_holder;
        $customer->acount_number          = $request->acount_number;
        $customer->bank_name              = $request->bank_name;
        $customer->bank_branch            = $request->bank_branch;
        $customer->city                   = $request->city;

         if($customer->save() ){
            Session::flash('message','Customer Update Successfully');
         }

         return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $customer = Customer::find($id);
        if (file_exists('uploads/customer/'.$customer->photo))
        {
            unlink('uploads/customer/'.$customer->photo);
        }
       if($customer->delete() ){
            Session::flash('message','Customer Successfully Deleted');
       }
        return redirect()->back();
    }
}
