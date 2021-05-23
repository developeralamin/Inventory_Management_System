@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title text-danger">Add Customer</h3></div>
      <div class="panel-body">
         <div class=" form">

  <form class="cmxform form-horizontal tasi-form" method="post" 
    action="{{  route('customer.store')  }}" enctype="multipart/form-data">
    @csrf

       <div class="form-group ">
           <label for="name" class="control-label col-lg-2">Name <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="name" name="name" type="text">

           <font style="color: red">
            {{ ($errors->has('name'))?($errors->first('name')):'' }}
          </font>
          
         </div>
       </div>

         <div class="form-group ">
           <label for="email" class="control-label col-lg-2">Email <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="email" name="email" type="email">

           <font style="color: red">
            {{ ($errors->has('email'))?($errors->first('email')):'' }}
          </font>

         </div>
       </div>

       <div class="form-group ">
           <label for="phone" class="control-label col-lg-2">Phone <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="phone" name="phone" type="text">

           <font style="color: red">
            {{ ($errors->has('phone'))?($errors->first('phone')):'' }}
          </font>

         </div>
       </div>  

       <div class="form-group ">
           <label for="address" class="control-label col-lg-2">Address <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="address" name="address" type="text">

           <font style="color: red">
            {{ ($errors->has('address'))?($errors->first('address')):'' }}
          </font>

         </div>
       </div>                                                 
                                                
       <div class="form-group ">
           <label for="shopname" class="control-label col-lg-2">Shopname <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="shopname" name="shopname" type="text">

            <font style="color: red">
            {{ ($errors->has('shopname'))?($errors->first('shopname')):'' }}
          </font>

         </div>
       </div>

       <div class="form-group ">
           <label for="acount_holder" class="control-label col-lg-2">Account Holder<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="acount_holder" name="acount_holder" type="text">

          <font style="color: red">
            {{ ($errors->has('acount_holder'))?($errors->first('acount_holder')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           <label for="acount_number" class="control-label col-lg-2">Account Number<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="acount_number" name="acount_number" type="text">

           <font style="color: red">
            {{ ($errors->has('acount_number'))?($errors->first('acount_number')):'' }}
          </font>

         </div>
       </div>        

        <div class="form-group ">
           <label for="bank_name" class="control-label col-lg-2">Bank Name <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="bank_name" name="bank_name" type="text">

           <font style="color: red">
            {{ ($errors->has('bank_name'))?($errors->first('bank_name')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="bank_branch" class="control-label col-lg-2">Bank Branch<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="bank_branch" name="bank_branch" type="text">

           <font style="color: red">
            {{ ($errors->has('bank_branch'))?($errors->first('bank_branch')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="city" class="control-label col-lg-2">City<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="city" name="city" type="text">

           <font style="color: red">
            {{ ($errors->has('city'))?($errors->first('city')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="photo" class="control-label col-lg-2">Upload Image<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="photo" name="photo" type="file">
           <font style="color: red">
            {{ ($errors->has('photo'))?($errors->first('photo')):'' }}
          </font> 
         </div>
       </div>

        
              </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="{{ route('customer.index') }}">Cancel</a>


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