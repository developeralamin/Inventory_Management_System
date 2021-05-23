@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title text-danger">Add Supplier</h3></div>
      <div class="panel-body">
         <div class=" form">

  <form class="cmxform form-horizontal tasi-form" method="post" 
    action="{{  route('supplier.store')  }}" enctype="multipart/form-data">
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
           <label for="shop" class="control-label col-lg-2">Shopname <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="shop" name="shop" type="text">

            <font style="color: red">
            {{ ($errors->has('shop'))?($errors->first('shop')):'' }}
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
           <label for="type" class="control-label col-lg-2">Supplier Type<span class="text-danger">*</span></label>
         <div class="col-lg-10">

           <select name="type" class="form-control">
             <option disabled="" selected=""></option>
             <option value="Whole Seller">Whole Seller</option>
             <option value="Distributer">Distributer</option>
             <option value="Brochure">Brochure</option>
           </select>

           <font style="color: red">
            {{ ($errors->has('type'))?($errors->first('type')):'' }}
          </font>
         </div>
       </div>



       <div class="form-group ">
           <label for="acountholder" class="control-label col-lg-2">Account Holder<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="acountholder" name="acountholder" type="text">

          <font style="color: red">
            {{ ($errors->has('acountholder'))?($errors->first('acountholder')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           <label for="acountnumber" class="control-label col-lg-2">Account Number<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="acountnumber" name="acountnumber" type="text">

           <font style="color: red">
            {{ ($errors->has('acountnumber'))?($errors->first('acountnumber')):'' }}
          </font>

         </div>
       </div>        

        <div class="form-group ">
           <label for="bankname" class="control-label col-lg-2">Bank Name <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="bankname" name="bankname" type="text">

           <font style="color: red">
            {{ ($errors->has('bankname'))?($errors->first('bankname')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="bankbranch" class="control-label col-lg-2">Bank Branch<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="bankbranch" name="bankbranch" type="text">

           <font style="color: red">
            {{ ($errors->has('bankbranch'))?($errors->first('bankbranch')):'' }}
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
   <a class="btn btn-default waves-effect" href="{{ route('supplier.index') }}">Cancel</a>


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