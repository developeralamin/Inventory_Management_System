@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 @if(session('error_message'))
             <div class="alert alert-danger" role="alert">
              {{ session('error_message') }}
            </div>
         @endif

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-default">
    <div class="panel-heading"><h3 class="panel-title text-danger">Update Company Information</h3></div>
      <div class="panel-body">
         <div class=" form">

    <form class="forms-sample" method="post" 
    action="{{ url('/update_setting/'.$setting->id) }}" enctype="multipart/form-data">
    
                   @csrf
                   {{-- @method('PUT')  --}}
    

       <div class="form-group ">
           <label for="company_name" class="control-label col-lg-2">Company Name <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_name" value="{{ $setting->company_name }}" name="company_name" type="text">

           <font style="color: red">
            {{ ($errors->has('company_name'))?($errors->first('company_name')):'' }}
          </font>
          
         </div>
       </div>


       <div class="form-group ">
           <label for="company_address" class="control-label col-lg-2">Company Address <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_address" value="{{ $setting->company_address }}" name="company_address" type="text">

           <font style="color: red">
            {{ ($errors->has('company_address'))?($errors->first('company_address')):'' }}
          </font>

         </div>
       </div>  

       <div class="form-group ">
           <label for="company_email" class="control-label col-lg-2">Company Email <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_email" value="{{ $setting->company_email }}" name="company_email" type="email">

           <font style="color: red">
            {{ ($errors->has('company_email'))?($errors->first('company_email')):'' }}
          </font>

         </div>
       </div>                                                 
                                                
       <div class="form-group ">
           <label for="company_phone" class="control-label col-lg-2">Company Phone <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_phone" value="{{ $setting->company_phone }}" name="company_phone" type="text">

            <font style="color: red">
            {{ ($errors->has('company_phone'))?($errors->first('company_phone')):'' }}
          </font>

         </div>
       </div>

       <div class="form-group ">
           <label for="company_mobile" class="control-label col-lg-2">Company Mobile <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_mobile" value="{{ $setting->company_mobile }}" name="company_mobile" type="text">

          <font style="color: red">
            {{ ($errors->has('company_mobile'))?($errors->first('company_mobile')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           <label for="company_city" class="control-label col-lg-2">Company City<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_city" value="{{ $setting->company_city }}" name="company_city" type="text">

           <font style="color: red">
            {{ ($errors->has('company_city'))?($errors->first('company_city')):'' }}
          </font>

         </div>
       </div>        

        <div class="form-group ">
           <label for="company_country" class="control-label col-lg-2">Company Country <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_country" value="{{ $setting->company_country }}" name="company_country" type="text">

           <font style="color: red">
            {{ ($errors->has('company_country'))?($errors->first('company_country')):'' }}
          </font>

         </div>
       </div>

        <div class="form-group ">
           <label for="company_zipcode" class="control-label col-lg-2">Company Zipcode<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_zipcode" value="{{ $setting->company_zipcode }}" name="company_zipcode" type="text">

           <font style="color: red">
            {{ ($errors->has('company_zipcode'))?($errors->first('company_zipcode')):'' }}
          </font>

         </div>
       </div>

      {{--   <div class="form-group ">
           <label for="company_logo" class="control-label col-lg-2">Company Logo<span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="company_logo" name="company_logo" type="file">

           <font style="color: red">
            {{ ($errors->has('company_logo'))?($errors->first('company_logo')):'' }}
          </font> 
         </div>
       </div> --}}

        
              </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="{{ route('setting.profile') }}">Cancel</a>


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