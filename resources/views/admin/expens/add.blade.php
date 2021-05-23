@extends('layouts.app')

@section('content')  

<div class="content-page">
<div class="content">
 <div class="container">

 <div class="row">
                     
    @if(session('message'))
             <div class="alert alert-success" role="alert">
              {{ session('message') }}
            </div>
          @endif
                              
  <div class="col-sm-12">
   <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title text-white"> Add Expense</h3>
      
    </div>
      <div class="panel-body">
        <a href="{{ route('monthly.expense') }}" class="btn  btn-info pull-right">This Month</a>
      <a href="{{  route('today.expense') }}" class="btn btn-danger pull-right">Today</a>
         <div class=" form">
          
          <h3>Date: {{ date('m/d/y') }}</h3> 

  <form class="cmxform form-horizontal tasi-form" method="post" 
    action="{{ url('/insert_expense') }} " enctype="multipart/form-data">
    @csrf


       <div class="form-group ">
           <label for="details" class="control-label col-lg-2">Expense Details <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <textarea class="form-control" rows="10" cols="10" id="details" name="details" placeholder="Expense Details" type="text"></textarea>
           <font style="color: red">
            {{ ($errors->has('details'))?($errors->first('details')):'' }}
          </font>
         </div>
       </div>
       

        <div class="form-group ">
           <label for="amount" class="control-label col-lg-2">Amount <span class="text-danger">*</span></label>
         <div class="col-lg-10">
          <input class="form-control" id="amount" name="amount" placeholder="Amount" type="text">

           <font style="color: red">
            {{ ($errors->has('amount'))?($errors->first('amount')):'' }}
          </font>
         </div>
       </div>

        <div class="form-group ">
           
         <div class="col-lg-10">
          <input class="form-control" id="month" value=" {{ date('M') }}" name="month" placeholder="Month" type="hidden">

           <font style="color: red">
            {{ ($errors->has('month'))?($errors->first('month')):'' }}
          </font>
         </div>
       </div>

        <div class="form-group ">
          
         <div class="col-lg-10">
          <input class="form-control" id="year" value=" {{ date('Y') }}" name="year" placeholder="Year" type="hidden">

           <font style="color: red">
            {{ ($errors->has('year'))?($errors->first('year')):'' }}
          </font>
         </div>
       </div>

       <div class="form-group ">
           
         <div class="col-lg-10">
          <input class="form-control" id="date" value=" {{ date('m/d/y') }}" name="date" placeholder="Date" type="hidden">

           <font style="color: red">
            {{ ($errors->has('date'))?($errors->first('date')):'' }}
          </font>
         </div>
       </div>

                                               
      </div>                

   <div class="form-group">
   <div class="col-lg-offset-2 col-lg-10">
   <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
   <a class="btn btn-default waves-effect" href="">Cancel</a>
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