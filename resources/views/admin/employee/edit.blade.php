@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title text-danger">Update Employee</h3></div>
      <div class="panel-body">
         <div class=" form">

    <form class="forms-sample" method="post" 
    action="{{ route('employee.update',$employee->id) }}" enctype="multipart/form-data">
    
                   @csrf
                   @method('PUT') 
    

       <div class="form-group ">
           <label for="name" class="control-label col-lg-2">Name <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="name" value="{{ $employee->name }}" name="name" type="text">

           <font style="color: red">
            {{ ($errors->has('name'))?($errors->first('name')):'' }}
          </font>
          
         </div>
       </div>

{{--          <div class="form-group ">
           <label for="email" class="control-label col-lg-2">Email <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="email" name="email" type="email">

           <font style="color: red">
            {{ ($errors->has('email'))?($errors->first('email')):'' }}
          </font>

         </div>
       </div> --}}

       <div class="form-group ">
           <label for="phone" class="control-label col-lg-2">Phone <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="phone" value="{{ $employee->phone }}" name="phone" type="text">

           <font style="color: red">
            {{ ($errors->has('phone'))?($errors->first('phone')):'' }}
          </font>

         </div>
       </div>  

       <div class="form-group ">
           <label for="address" class="control-label col-lg-2">Address <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="address" value="{{ $employee->address }}" name="address" type="text">

           <font style="color: red">
            {{ ($errors->has('address'))?($errors->first('address')):'' }}
          </font>

         </div>
       </div>                                                 
                                                
       <div class="form-group ">
           <label for="experience" class="control-label col-lg-2">Experience <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="experience" value="{{ $employee->experience }}" name="experience" type="text">

            <font style="color: red">
            {{ ($errors->has('experience'))?($errors->first('experience')):'' }}
          </font>

         </div>
       </div>

       <div class="form-group ">
           <label for="nid_no" class="control-label col-lg-2">NID NO. <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="nid_no" value="{{ $employee->nid_no }}" name="nid_no" type="text">

          <font style="color: red">
            {{ ($errors->has('nid_no'))?($errors->first('nid_no')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           <label for="vacation" class="control-label col-lg-2">Vacation<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="vacation" value="{{ $employee->vacation }}" name="vacation" type="text">

           <font style="color: red">
            {{ ($errors->has('vacation'))?($errors->first('vacation')):'' }}
          </font>

         </div>
       </div>        

        <div class="form-group ">
           <label for="city" class="control-label col-lg-2">City <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="city" value="{{ $employee->city }}" name="city" type="text">

           <font style="color: red">
            {{ ($errors->has('city'))?($errors->first('city')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="salary" class="control-label col-lg-2">Salary<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="salary" value="{{ $employee->salary }}" name="salary" type="text">

           <font style="color: red">
            {{ ($errors->has('salary'))?($errors->first('salary')):'' }}
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

        
              </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="{{ route('employee.index') }}">Cancel</a>


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