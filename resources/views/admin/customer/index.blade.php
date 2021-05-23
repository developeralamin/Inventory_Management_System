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
                               <a href="{{ route('customer.create') }}" class="pull-left panel-title btn btn-info ">Add Customer</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Customer</h3>
             
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Photo</th>
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($customer as $key=>$customer)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $customer->name }}</td>
                 <td>{{ $customer->email }}</td>
                 <td>{{ $customer->address }}</td>
                 <td>{{ $customer->city }}</td>
                 <td><img class="img-responsive img-thumbnail" 
                 src="{{ asset('uploads/customer/'.$customer->photo) }}"
                 style="height: 50px; width: 50px" alt=""></td>
                
               
                 
    <td class="text-right">

      <form  action="{{ route('customer.destroy',$customer->id) }}"  method="POST">
                  @csrf

                   <a href="{{ route('customer.show',$customer->id) }}" class="btn btn-info">
                         <i class="fa fa-eye">Show</i>
                    </a> 
                  <a href="{{ route('customer.edit',$customer->id) }}" class="btn btn-info">
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