<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['product'] = Product::all();

        return view('admin.product.index',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
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
          'product_name'                   => 'required',
          'cat_id'                         => 'required',
          'sup_id'                        => 'required',
          'product_code'                  => 'required',
          'product_garage'                => 'required',
          'product_route'                 => 'required',
          'buy_date'                      => 'required',
          'expire_date'                   => 'required',
          'buying_price'                  => 'required',
          'selling_price'                 => 'required',
          'product_image'                 => 'required|mimes:jpeg,jpg,bmp,png,svg',
        ]);

        $image = $request->file('product_image');
        // $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename =  $currentDate .'-'. uniqid() .'.'. $image->getClientOriginalExtension();
            if (!file_exists('uploads/product'))
            {
                mkdir('uploads/product', 0777 , true);
            }
            $image->move('uploads/product',$imagename);
        }else {
            $imagename = 'dafault.png';
        }

        $product                         = new Product();
        $product->product_name           = $request->product_name;
        $product->cat_id                 = $request->cat_id;
        $product->sup_id                 = $request->sup_id;
        $product->product_code           = $request->product_code;
        $product->product_garage         = $request->product_garage;
        $product->product_route          = $request->product_route;
        $product->buy_date               = $request->buy_date;
        $product->expire_date            = $request->expire_date;
        $product->buying_price           = $request->buying_price;
        $product->selling_price          = $request->selling_price;
        $product->product_image          = $imagename;
       if($product->save()){
         Session::flash('message','Product Successfully Added');
       }
       return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $product=DB::table('products')
                ->join('categories','products.cat_id','categories.id')
                ->join('suppliers','products.sup_id','suppliers.id')
                ->select('categories.category_name','products.*','suppliers.name')
                ->where('products.id',$id)
                ->first();
               
      return view('admin.product.show',compact('product'));
        

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $this->data['product']  = Product::find($id);

          return view('admin.product.edit',$this->data);
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
         $data                    = $request->all();

        $product                  = Product::find($id);
        $product->product_name    = $data['product_name'];
        $product->cat_id          = $data['cat_id'];
        $product->sup_id          = $data['sup_id'];
        $product->product_code    = $data['product_code'];
        $product->product_garage  = $data['product_garage'];
        $product->product_route   = $data['product_route'];
        $product->buy_date        = $data['buy_date'];
        $product->expire_date     = $data['expire_date'];
        $product->buying_price    = $data['buying_price'];
        $product->selling_price   = $data['selling_price'];

         if($product->save() ){
            Session::flash('message','Product Update Successfully');
         }

         return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $product = Product::find($id);
        if (file_exists('uploads/product/'.$product->product_image))
        {
            unlink('uploads/product/'.$product->product_image);
        }
       if($product->delete() ){
            Session::flash('message','Product Successfully Deleted');
       }
        return redirect()->back();
    }
}
