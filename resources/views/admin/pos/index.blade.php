@extends('layouts.app')

@section('content')
                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

      @if(session('message'))
             <div class="alert alert-success" role="alert">
              {{ session('message') }}
            </div>
         @endif

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12 bg-info">
                    <h2 class="pull-left page-title text-white">POS (Point Of Sale) !</h2>
                    <ol class="breadcrumb pull-right">
                        <li class="text-white">EcoVel IT</li>
                        <li class="text-white">{{ date('d/m/y') }}</li>
                    </ol>
                </div>
            </div>

<div class="row"><br>
     <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <div class="portfolioFilter">
                @foreach($categories as $category)
                <a href="#" data-filter="*" class="current">{{ $category->category_name }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <br>
    <div class="col-lg-5">

         <div class="price_card text-center">
                                        
<ul class="price-features">
<table class="table">
   <thead>
        <tr>
          <th>Name</th>
           <th>Qty</th>
          <th>Price</th>
          <th>SubTotal</th>
        <th>Actions</th>
        </tr>
  </thead>

         @php
             $show_product = Cart::content();
         @endphp 

        <tbody>
        @foreach($show_product as $adddd_cart)
        <tr>
        <th>{{ $adddd_cart->name }}</th>
        <th>


<form action="{{ url('/cart_update/'.$adddd_cart->rowId) }}" method="post">

    @csrf
        <input type="number" name="qty" value="{{ $adddd_cart->qty }}" style="width: 80px">
        <button style="margin-top: -3px;" type="submit" class="btn btn-sm btn-info">
        <i class="fa fa-check"></i></button>
 </form>

        </th>
        <th>{{ $adddd_cart->price }}</th>
        <th>{{ $adddd_cart->price*$adddd_cart->qty }}</th>
        <th>
        <a href="{{ url('/cart_remove/'.$adddd_cart->rowId) }}"><i class="fa fa-trash text-danger"></i></a></th>
        </tr>
        @endforeach() 
        </tbody>
        </table>
        </ul>

            <div class="pricing-header bg-danger">
                <br>
             <table style="margin-left: 33%; margin-top: 5%" class="m-auto">

              <tr>
                <th style="font-size:20px; " class="text-white text-center">Quantity : </th>

                <td style="font-size:20px; " class="text-white text-left">
                {{ Cart::count() }}</td>
              </tr>

             <tr>
                <th style="font-size:20px; " class="text-white text-center">SubTotal : </th>
                <td style="font-size:20px; " class="text-white text-left">
                {{ Cart::subtotal() }}</td>
            </tr>

            <tr>
                <th style="font-size:20px; " class="text-white text-center">
                Vat : </th>
                <td style="font-size:20px; " class="text-white text-left">
                {{ Cart::tax() }}</td>
              </tr>

          </table>
              
                <hr>
                <p> <h2 class="text-white">Total :</h2>
                <h2 class="text-white">{{ Cart::total() }}</h2></p>
                <br>

            </div>
            <br>

          @php
              $customer=DB::table('customers')->get();
          @endphp  

<form action="{{ url('/invoice') }}" method="post">

         @csrf

        <div class="panel">
              <h4 class="text-info">Select Customer</h4>
              <a href="#" class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>

      <select name="cus_id" class="form-control">
             <option disabled="" selected="">Select Customer</option>
             @foreach($customer as $row)
             <option value="{{ $row->id }}">{{ $row->name }}</option>
             @endforeach
     </select>
      <font style="color: red;font-size: 24px;">
            {{ ($errors->has('cus_id'))?($errors->first('cus_id')):'' }}
     </font>

         </div>
           <input type="submit" value="Create Invoice" name="" class="btn btn-success">


          </form> 
        </div> 
    </div> <!-- end col -->
            

                             
            <!--All Product show here-->
            <!--All Product show here-->

            <div class="col-lg-7">
            <table id="usetable" class="table table-striped table-bordered">
            <thead>
            <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Product Code</th>
              <th>Add</th>
             
            </tr>
            </thead>

            @foreach ($product as $row)

            <tbody>
            <tr>

            <form action="{{ url('/add_cart') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{ $row->id }}"> 
            <input type="hidden" name="name" value="{{ $row->product_name }}"> 
            <input type="hidden" name="qty" value="1"> 
            <input type="hidden" name="price" value="{{ $row->selling_price }}"> 


            <td><img class="img-responsive img-thumbnail" 
                    src="{{ asset('uploads/product/'.$row->product_image) }}"
                    style="height: 100px; width: 100px" alt="">
            </td>
            <td>{{ $row->product_name }}</td>
            <td>{{ $row->category_name }}</td>
            <td>{{ $row->product_code }}</td>

            <td><button type="submit" class="btn btn-sm btn-info"><i class="fa fa-plus-square" style="font-size: 40px;" aria-hidden="true"></i></button></td>

            </form>
            </tr>
            </tbody>
            @endforeach()
                                     
                                           
            </table>
                </div>
            </div>
               

            </div> <!-- container -->
                       
            </div> <!-- content -->
            </div>

     <form class="cmxform form-horizontal tasi-form" method="post" 
            action="{{  route('customer.store')  }}" enctype="multipart/form-data">
            @csrf

            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
            <div class="modal-content"> 
            <div class="modal-header"> 
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
            <h4 class="modal-title">Add New Customer</h4> 
            </div> 
            <div class="modal-body"> 
            <div class="row"> 
            <div class="col-md-6"> 
            <div class="form-group"> 
            <label for="field-1" class="control-label">Name</label> 
            <input class=" form-control" required=""  id="name" name="name" type="text">

            </div> 
            </div> 
            <div class="col-md-6"> 
            <div class="form-group"> 
            <label for="field-2" class="control-label">Email</label> 
            <input class=" form-control" required="" id="email" name="email" type="email"> 
            </div> 
            </div> 
            </div> 
            <div class="row"> 
            <div class="col-md-12"> 
            <div class="form-group"> 
            <label for="field-3" class="control-label">Phone</label> 
            <input class=" form-control"required=""  id="phone" name="phone" type="text">
            </div> 
            </div> 
            </div> 
            <div class="row"> 
            <div class="col-md-4"> 
            <div class="form-group"> 
            <label for="field-4" class="control-label">Address</label> 
            <input class=" form-control" required="" id="address" name="address" type="text"> 
            </div> 
            </div> 
            <div class="col-md-4"> 
            <div class="form-group"> 
            <label for="field-5" class="control-label">ShopName</label> 
                  <input class=" form-control"required=""  id="shopname" name="shopname" type="text">

            </div> 
            </div> 
            <div class="col-md-4"> 
            <div class="form-group"> 
            <label for="field-6" class="control-label">Account Holder</label> 
            <input class=" form-control"required=""  id="acount_holder" name="acount_holder" type="text">

            </div> 
            </div> 
            </div> 

            <div class="col-md-4"> 
            <div class="form-group no-margin"> 
            <label for="field-7" class="control-label">Account Number</label> 
            <input class=" form-control" required="" id="acount_number" name="acount_number" type="text">
            </div> 
            </div> 

            <div class="col-md-4"> 
            <div class="form-group no-margin"> 
            <label for="field-7" class="control-label">Bank Name</label> 
            <input class=" form-control" required="" id="bank_name" name="bank_name" type="text">
            </div> 
            </div> 

            <div class="col-md-4"> 
            <div class="form-group no-margin"> 
            <label for="field-7" class="control-label">Bank Branch</label> 
            <input class=" form-control" required="" id="bank_branch" name="bank_branch" type="text">
            </div> 
            </div> 

            <div class="col-md-4"> 
            <div class="form-group no-margin"> 
            <label for="field-7" class="control-label">City</label> 
            <input class=" form-control" required="" id="city" name="city" type="text">
            </div> 
            </div> 

            <div class="col-md-4"> 
            <div class="form-group no-margin"> 
            <label for="field-7" class="control-label">Upload Image</label> 
            <input class=" form-control" id="photo" required="" name="photo" type="file">
            </div> 
            </div> 

            </div> 
            <div class="modal-footer"> 
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
            </div> 

            </div> 
            </div>
            </div><!-- /.modal -->    

              </form> 
 @endsection
