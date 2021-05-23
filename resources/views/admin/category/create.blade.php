@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title text-white"> Category Provide</h3>
    </div>
      <div class="panel-body">
         <div class=" form">

  <form class="cmxform form-horizontal tasi-form" method="post" 
    action="{{  route('category.store')  }}" enctype="multipart/form-data">
    @csrf


       <div class="form-group ">
           <label for="category_name" class="control-label col-lg-2">Category <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class="form-control" id="category_name" name="category_name" placeholder="Category Name" type="text">

           <font style="color: red">
            {{ ($errors->has('category_name'))?($errors->first('category_name')):'' }}
          </font>
         </div>
       </div>

                                               
      </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="{{ route('category.index') }}">Cancel</a>
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


@endsection