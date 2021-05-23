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
                            <div class="col-sm-12">
                               <a href="{{ route('add.expense') }}" class=" panel-title btn btn-danger pull-right ">Add Expense</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Yearly Expense</h3>
              <h3 class="panel-title text-danger">{{ date('Y')  }} All EXPENSE</h3>
               
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Details</th>
                      <th>Amount</th>
                      
                    </tr>
                </thead>

         @foreach ($year as $key=>$row)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $row->details }}</td>
                 <td>{{ $row->amount }}</td>
         
                        </tr>
                      </tbody>
          @endforeach()
                                             
                                                   
              </table>
          @php
            $year = date('Y');
           $total = DB::table('expenses')->where('year',$year)->sum('amount');
          @endphp
              <h2 class="text-center text-danger">{{ date('Y')  }} Total Expense : {{ $total }} tk</h2>


            </div>
        </div>
    </div>
</div>
</div>
                            
 </div> <!-- End Row -->
 </div> <!-- container -->
</div> <!-- content -->
</div>


@endsection

