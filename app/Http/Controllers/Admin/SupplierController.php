<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Supplier;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['supplier']  = Supplier::all();
        return view('admin.supplier.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.supplier.create');
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
          'name'                       => 'required',
          'phone'                      => 'required|numeric|unique:suppliers',
          // 'phone'                      => 'required|unique:suppliers',
          'address'                    => 'required',
          'shop'                       => 'required',
          'type'                       => 'required',
          'acountholder'               => 'required',
          'city'                       => 'required',
          'acountnumber'               => 'required',
          'bankname'                   => 'required',
          'bankbranch'                 => 'required',
          'photo'                      => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('photo');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/supplier'))
            {
                mkdir('uploads/supplier', 0777 , true);
            }
            $image->move('uploads/supplier',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $supplier                         = new Supplier();
        $supplier->name                   = $request->name;
        $supplier->email                  = $request->email;
        $supplier->phone                  = $request->phone;
        $supplier->address                = $request->address;
        $supplier->shop                   = $request->shop;
        $supplier->type                   = $request->type;
        $supplier->acountholder           = $request->acountholder;
        $supplier->city                   = $request->city;
        $supplier->acountnumber           = $request->acountnumber;
        $supplier->bankname               = $request->bankname;
        $supplier->bankbranch             = $request->bankbranch;
        $supplier->photo                  = $imagename;
       if($supplier->save()){
         Session::flash('message','Supplier Successfully Added');
       }
       return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->data['supplier']  = Supplier::findOrFail($id);
         return view('admin.supplier.show',$this->data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $this->data['supplier']  = Supplier::find($id);
         return view('admin.supplier.edit',$this->data);
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
          'name'                       => 'required',
          'phone'                      => 'required',
          // 'phone'                      => 'required|unique:suppliers',
          'address'                    => 'required',
          'shop'                       => 'required',
          'type'                       => 'required',
          'acountholder'               => 'required',
          'city'                       => 'required',
          'acountnumber'               => 'required',
          'bankname'                   => 'required',
          'bankbranch'                 => 'required',
          // 'photo'                      => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

         $data                            = $request->all();

         $supplier                        = Supplier::find($id);
        $supplier->name                   = $data['name'];
        $supplier->email                  = $data['email'];
        $supplier->phone                  = $data['phone'];
        $supplier->address                = $data['address'];
        $supplier->shop                   = $data['shop'];
        $supplier->type                   = $data['type'];
        $supplier->acountholder           = $data['acountholder'];
        $supplier->city                   = $data['city'];
        $supplier->acountnumber           = $data['acountnumber'];
        $supplier->bankname               = $data['bankname'];
        $supplier->bankbranch             = $data['bankbranch'];

         if($supplier->save() ){
            Session::flash('message','Supplier Update Successfully');
         }

         return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        if (file_exists('uploads/supplier/'.$supplier->photo))
        {
            unlink('uploads/supplier/'.$supplier->photo);
        }
       if($supplier->delete() ){
            Session::flash('message','Employee Successfully Deleted');
       }
        return redirect()->back();
    }
}
