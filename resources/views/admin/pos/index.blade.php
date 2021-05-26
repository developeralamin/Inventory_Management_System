@extends('layouts.app')

@section('content')
                      
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

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
         <div class="panel">
              <h4 class="text-info">Customer</h4>
              <a href="#" class="btn btn-primary waves-effect waves-light pull-right" data-toggle="modal" data-target="#con-close-modal">Add New</a>

     <select name="cat_id" placeholder="Category Name" class="form-control">
             <option disabled="" selected="">Select Customer</option>
             @foreach($customer as $row)
             <option value="">{{ $row->name }}</option>
             @endforeach
           </select>
         </div>

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
                    <tbody>
                          <tr>
                           <th>data</th>
                         <th><input type="text" value="2" style="width: 80px"></th>
                         <th>2200</th>
                         <th>3330</th>
                         <th><i class="fa fa-trash"></i></th>
                          </tr>
                    </tbody>
                </table>
          </ul>

            <div class="pricing-header bg-primary">
                <br>
                <p>Quantity : 00.00</p>
                  <p>Product : 00.00</p>
                <p>Vat      : 00.00</p>
              
                <hr>
                <p> <h2 class="text-white">Total :</h2><h2 class="text-white">00.00</h2></p>
                <br>

            </div>
            <br>
           <input type="submit" value="Create Invoice" name="" class="btn btn-success">
        </div> <!-- end Pricing_card -->
    </div> <!-- end col -->


                 

            <div class="col-lg-7">
                <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Product Code</th>
                     
                    </tr>
                </thead>

         @foreach ($product as $row)

             <tbody>
                <tr>

                 <td><a href="#" style="font-size: 40px;"><i class="fa fa-plus-square" aria-hidden="true"></i></a> <img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/product/'.$row->product_image) }}"
                            style="height: 100px; width: 100px" alt=""></td>
                 <td>{{ $row->product_name }}</td>
                 <td>{{ $row->category_name }}</td>
                 <td>{{ $row->product_code }}</td>

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
