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

          {{-- //Monthly Expense --}}

          <a href="{{ route('januray.expense') }}" class="btn btn-sm btn-info">January</a>
            <a href="{{ route('february.expense') }}" class="btn btn-sm btn-danger">February</a>
            <a href="{{ route('march.expense') }}" class="btn btn-sm btn-success">March</a>
            <a href="{{ route('april.expense') }}" class="btn btn-sm btn-primary">April</a>
            <a href="{{ route('may.expense') }}" class="btn btn-sm btn-success">May</a>
            <a href="{{ route('june.expense') }}" class="btn btn-sm btn-info">June</a>
            <a href="{{ route('july.expense') }}" class="btn btn-sm btn-success">July</a>
            <a href="{{ route('august.expense') }}" class="btn btn-sm btn-danger">August</a>
            <a href="{{ route('sepemtember.expense') }}" class="btn btn-sm btn-primary">September</a>
            <a href="{{ route('october.expense') }}" class="btn btn-sm btn-danger">October</a>
            <a href="{{ route('november.expense') }}" class="btn btn-sm btn-success">November</a>
            <a href="{{ route('december.expense') }}" class="btn btn-sm btn-primary">December</a>
    
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               <a href="{{ route('add.expense') }}" class=" panel-title btn btn-danger pull-right ">Add Expense</a>
                               <a href="{{ route('monthly.expense') }}" class=" panel-title btn btn-info pull-right ">Back</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Monthly Expense</h3>
              <h3 class="panel-title text-danger"> All EXPENSE</h3>
               
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Details</th>
                      <th>Date</th>
                      <th>Amount</th>
                      
                    </tr>
                </thead>

         @foreach ($month as $key=>$row)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $row->details }}</td>
                 <td>{{ $row->date }}</td>
                 <td>{{ $row->amount }}</td>
         
                        </tr>
                      </tbody>
          @endforeach()
                                             
                                                   
              </table>
          @php
            $month = date('F');
           $total = DB::table('expenses')->where('month',$month)->sum('amount');
          @endphp
              <h2 class="text-center text-danger"> Total Expense : {{ $total }} tk</h2>


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

