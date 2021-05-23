@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                        
  <div class="col-sm-12">
   <div class="panel panel-info">
    <div class="panel-heading"><h3 class="panel-title text-white">Advanced Salary Provide</h3></div>
      <div class="panel-body">
         <div class=" form">

  <form class="cmxform form-horizontal tasi-form" method="post" 
    action="{{  route('salary.store')  }}" enctype="multipart/form-data">
    @csrf


       <div class="form-group ">
           <label for="type" class="control-label col-lg-2">Employee Type<span class="text-danger">*</span></label>
           @php
             $emp = DB::table('employees')->get();
           @endphp
         <div class="col-lg-10">

           <select name="emp_id" class="form-control">
             <option disabled="" selected=""></option>
             @foreach($emp as $row)
             <option value="{{ $row->id }}">{{ $row->name }}</option>
             @endforeach
           </select>

           <font style="color: red">
            {{ ($errors->has('emp_id'))?($errors->first('emp_id')):'' }}
          </font>
         </div>
       </div>


       <div class="form-group ">
           <label for="type" class="control-label col-lg-2">Month<span class="text-danger">*</span></label>
          
         <div class="col-lg-10">

           <select name="month" class="form-control">
             <option disabled="" selected=""></option>
             <option value="January">January</option>
             <option value="February">February</option>
             <option value="March">March</option>
             <option value="April">April</option>
             <option value="May">May</option>
             <option value="June">June</option>
             <option value="July">July</option>
             <option value="August">August</option>
             <option value="Semtember">Semtember</option>
             <option value="October">October</option>
             <option value="November">November</option>
             <option value="December">December</option>
            
           </select>

           <font style="color: red">
            {{ ($errors->has('month'))?($errors->first('month')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           <label for="year" class="control-label col-lg-2">Year <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="year" name="year" placeholder="Year" type="text">

           <font style="color: red">
            {{ ($errors->has('year'))?($errors->first('year')):'' }}
          </font>
         </div>
       </div>


         <div class="form-group ">
           <label for="advanced_salary" class="control-label col-lg-2">Advanced Salary <span class="text-danger"></span></label>
         <div class="col-lg-10">
          <input class=" form-control" id="advanced_salary" placeholder="Advanced Salary" name="advanced_salary" type="advanced_salary">

           <font style="color: red">
            {{ ($errors->has('advanced_salary'))?($errors->first('advanced_salary')):'' }}
          </font>

         </div>
       </div>

                                               
      </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="{{ route('salary.index') }}">Cancel</a>


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