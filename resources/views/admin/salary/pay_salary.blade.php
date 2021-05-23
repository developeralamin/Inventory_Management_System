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
                               {{-- <p  class="pull-left panel-title s">Pay Salary</p> --}}
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Pay Salary <span class="pull-right text-danger">{{ date('F Y') }}</span> </h3>
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Month</th>
                      <th>Advanced Salary</th>
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($salary as $key=>$salary)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $salary->name }}</td>
                 <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/employee/'.$salary->photo) }}"
                            style="height: 50px; width: 50px" alt=""></td>
                 <td><span class="badge badge-success">{{ date('F',strtotime('-1 month')) }}</span></td>
                 
                 <td></td>

                 
    <td class="text-right">

      <form  action="{{ route('salary.destroy',$salary->id) }}"  method="POST">
                  @csrf

                   <a href="" class="btn btn-sm btn-info">
                         Pay Now
                    </a> 
                                  
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