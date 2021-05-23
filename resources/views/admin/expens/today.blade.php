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

          {{-- //Today Expense --}}
          @php
            $date = date('m/d/y');
           $expense = DB::table('expenses')->where('date',$date)->sum('amount');
          @endphp


             <h2 class="text-danger text-center">Today Total Expense : {{ $expense }} Tk</h2>
                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                               <a href="{{ route('add.expense') }}" class=" panel-title btn btn-danger pull-right ">Add Expense</a>
                               <a href="{{ route('today.expense') }}" class=" panel-title btn btn-info pull-right ">Back</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Today Expense</h3>
             
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
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($today as $key=>$today)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $today->details }}</td>
                 <td>{{ $today->amount }}</td>
         
    <td class="text-right">

      <form  action="{{ url('/delete_today_expense',$today->id) }}"  method="POST">
                  @csrf

                  <a href="{{  url('/edit_today_expense',$today->id) }}" class="btn btn-info">
                         <i class="fa fa-edit">Edit</i>
                    </a>   
                @method('DELETE')              
                <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Delete</button>                
                      </form>                                    
                  </td>
                        </tr>
                      </tbody>
          @endforeach()
                                             
                                                   
              </table>

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

