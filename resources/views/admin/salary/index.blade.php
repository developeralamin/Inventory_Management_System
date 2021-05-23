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
                               <a href="{{ route('salary.create') }}" class="pull-left panel-title btn btn-info ">Add Salary</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Salary</h3>
             
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
                      <th>Year</th>
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
                 <td>{{ $salary->month }}</td>
                 <td>{{ $salary->year }}</td>
                 <td>{{ $salary->advanced_salary }}</td>

                 
    <td class="text-right">

      <form  action="{{ route('salary.destroy',$salary->id) }}"  method="POST">
                  @csrf

                   <a href="{{ route('salary.show',$salary->id) }}" class="btn btn-info">
                         <i class="fa fa-eye">Show</i>
                    </a> 
                  <a href="{{ route('salary.edit',$salary->id) }}" class="btn btn-info">
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

