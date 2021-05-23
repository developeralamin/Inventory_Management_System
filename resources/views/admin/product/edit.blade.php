@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title text-danger">Add Product</h3></div>
      <div class="panel-body">
         <div class=" form">


  <form class="forms-sample" method="post" 
    action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
    
                   @csrf
                   @method('PUT') 

       <div class="form-group ">
           <label for="product_name" class="control-label col-lg-2">Product Name <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="product_name" 
            value="{{ $product->product_name }}" name="product_name" type="text">

           <font style="color: red">
            {{ ($errors->has('product_name'))?($errors->first('product_name')):'' }}
          </font>
          
         </div>
       </div>

         <div class="form-group ">
           <label for="cat_id" class="control-label col-lg-2">Category <span class="text-danger"></span></label>
          @php
             $emp = DB::table('categories')->get();
           @endphp
         <div class="col-lg-10">

           <select name="cat_id" placeholder="Category Name" class="form-control">
             <option disabled="" selected=""></option>

             @foreach($emp as $row)

             <option value="{{ $row->id }}" <?php if($product->cat_id==$row->id){echo "selected";}?> >{{ $row->category_name }}</option>

             @endforeach

           </select>

           <font style="color: red">
            {{ ($errors->has('cat_id'))?($errors->first('cat_id')):'' }}
          </font>

         </div>
       </div>

       <div class="form-group ">
           <label for="sup_id" class="control-label col-lg-2">Supplier <span class="text-danger">*</span></label>
          @php
             $emp = DB::table('suppliers')->get();
          @endphp
         <div class="col-lg-10">

           <select name="sup_id" placeholder="Supplier Name" class="form-control">
             <option disabled="" selected=""></option>

             @foreach($emp as $row)

             <option value="{{ $row->id }}" <?php if($product->sup_id==$row->id){echo "selected";}?> >{{ $row->name }}</option>

             @endforeach

           </select>

           <font style="color: red">
            {{ ($errors->has('sup_id'))?($errors->first('sup_id')):'' }}
          </font>

         </div>
       </div>  

       <div class="form-group ">
           <label for="product_code" class="control-label col-lg-2">Product Code <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" value="{{ $product->product_code }}" id="product_code" name="product_code" type="text">

           <font style="color: red">
            {{ ($errors->has('product_code'))?($errors->first('product_code')):'' }}
          </font>

         </div>
       </div>                                                 
                                                
       <div class="form-group ">
           <label for="product_garage" class="control-label col-lg-2">Ghoudaowun <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="product_garage" value="{{ $product->product_garage }}" name="product_garage" type="text">

            <font style="color: red">
            {{ ($errors->has('product_garage'))?($errors->first('product_garage')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="product_route" class="control-label col-lg-2">Product Route<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="product_route" value="{{ $product->product_route }}" name="product_route" type="text">

           <font style="color: red">
            {{ ($errors->has('product_route'))?($errors->first('product_route')):'' }}
          </font>
         </div>
       </div>
      

       <div class="form-group ">
           <label for="buy_date" class="control-label col-lg-2">Buying Date<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="buy_date" value="{{ $product->buy_date }}" name="buy_date" type="date">

           <font style="color: red">
            {{ ($errors->has('buy_date'))?($errors->first('buy_date')):'' }}
          </font>

         </div>
       </div>        

        <div class="form-group ">
           <label for="expire_date" class="control-label col-lg-2">Expire Date <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="expire_date" 
           value="{{ $product->expire_date }}" name="expire_date" type="date">

           <font style="color: red">
            {{ ($errors->has('expire_date'))?($errors->first('expire_date')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="buying_price" class="control-label col-lg-2">Buying Price<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="buying_price" 
          value="{{ $product->buying_price }}" name="buying_price" type="text">

           <font style="color: red">
            {{ ($errors->has('buying_price'))?($errors->first('buying_price')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="selling_price" class="control-label col-lg-2">Selling Price<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="selling_price"
           value="{{ $product->selling_price }}" name="selling_price" type="text">

           <font style="color: red">
            {{ ($errors->has('selling_price'))?($errors->first('selling_price')):'' }}
          </font>

         </div>
       </div>
              </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="{{ route('product.index') }}">Cancel</a>


         </div>
        </div>
       </form>
      </div> <!-- .form -->
     </div> <!-- panel-body -->
     </div> <!-- panel -->
    </div> <!-- col -->
</div> <!-- End row -->
</div> <!-- container -->                          
</div> <!-- content -->
</div>


@endsection