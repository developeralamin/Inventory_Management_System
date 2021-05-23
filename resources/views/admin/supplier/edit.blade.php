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

  <form class="forms-sample" method="post" 
    action="{{ route('supplier.update',$supplier->id) }}" enctype="multipart/form-data">
    
                   @csrf
                   @method('PUT') 

       <div class="form-group ">
           <label for="name" class="control-label col-lg-2">Name <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="name" value="{{ $supplier->name }}" name="name" type="text">

           <font style="color: red">
            {{ ($errors->has('name'))?($errors->first('name')):'' }}
          </font>
          
         </div>
       </div>

         <div class="form-group ">
           <label for="email" class="control-label col-lg-2">Email <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="email" value="{{ $supplier->email }}" name="email" type="email">

           <font style="color: red">
            {{ ($errors->has('email'))?($errors->first('email')):'' }}
          </font>

         </div>
       </div>

       <div class="form-group ">
           <label for="phone" class="control-label col-lg-2">Phone <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="phone" value="{{ $supplier->phone }}" name="phone" type="text">

           <font style="color: red">
            {{ ($errors->has('phone'))?($errors->first('phone')):'' }}
          </font>

         </div>
       </div>  

       <div class="form-group ">
           <label for="address" class="control-label col-lg-2">Address <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="address" value="{{ $supplier->address }}" name="address" type="text">

           <font style="color: red">
            {{ ($errors->has('address'))?($errors->first('address')):'' }}
          </font>

         </div>
       </div>                                                 
                                                
       <div class="form-group ">
           <label for="shop" class="control-label col-lg-2">Shopname <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="shop" value="{{ $supplier->shop }}" name="shop" type="text">

            <font style="color: red">
            {{ ($errors->has('shop'))?($errors->first('shop')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="city" class="control-label col-lg-2">City<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="city" value="{{ $supplier->city }}" name="city" type="text">

           <font style="color: red">
            {{ ($errors->has('city'))?($errors->first('city')):'' }}
          </font>
         </div>
       </div>
       
       <div class="form-group ">
           <label for="type" class="control-label col-lg-2">Supplier Type<span class="text-danger">*</span></label>
         <div class="col-lg-10">
         
           <select name="type" class="form-control">
              
              

             <option value="{{ $supplier->type }}" >{{ $supplier->type }}</option>
            
           {{-- @foreach($supplier as $key => $cls)
            <option value="{{ $cls->type }}">{{ $cls->type }}</option>}  
           @endforeach --}}

           </select>

           <font style="color: red">
            {{ ($errors->has('type'))?($errors->first('type')):'' }}
          </font>
         </div>
       </div>



       <div class="form-group ">
           <label for="acountholder" class="control-label col-lg-2">Account Holder<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="acountholder" value="{{ $supplier->acountholder }}" name="acountholder" type="text">

          <font style="color: red">
            {{ ($errors->has('acountholder'))?($errors->first('acountholder')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           <label for="acountnumber" class="control-label col-lg-2">Account Number<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="acountnumber" value="{{ $supplier->acountnumber }}" name="acountnumber" type="text">

           <font style="color: red">
            {{ ($errors->has('acountnumber'))?($errors->first('acountnumber')):'' }}
          </font>

         </div>
       </div>        

        <div class="form-group ">
           <label for="bankname" class="control-label col-lg-2">Bank Name <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="bankname" value="{{ $supplier->bankname }}" name="bankname" type="text">

           <font style="color: red">
            {{ ($errors->has('bankname'))?($errors->first('bankname')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="bankbranch" class="control-label col-lg-2">Bank Branch<span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="bankbranch" value="{{ $supplier->bankbranch }}" name="bankbranch" type="text">

           <font style="color: red">
            {{ ($errors->has('bankbranch'))?($errors->first('bankbranch')):'' }}
          </font>

         </div>
       </div>

{{--         <div class="form-group ">
           <label for="photo" class="control-label col-lg-2">Upload Image<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="photo" name="photo" type="file">
           <font style="color: red">
            {{ ($errors->has('photo'))?($errors->first('photo')):'' }}
          </font> 
         </div>
       </div> --}}
{{-- 
        <div class="form-group ">
          <label for="photo" class="control-label col-lg-2"><span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <img src="{{ URL::to('uploads/supplier/'.$supplier->photo) }}" width="80px" height="80px" alt="">

          <input class=" form-control" id="photo" name="oldphoto" value="{{ $supplier->photo }}" type="hidden">


           <font style="color: red">
            {{ ($errors->has('photo'))?($errors->first('photo')):'' }}
          </font> 
         </div>
       </div>
 --}}
        
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