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
                               <a href="{{ route('supplier.create') }}" class="pull-left panel-title btn btn-info ">Add Supplier</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Supplier</h3>
             
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>Type</th>
                      <th>Photo</th>
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($supplier as $key=>$supplier)

             <tbody>
                <tr>

                 <td>{{ $key+1 }}</td>
                 <td>{{ $supplier->name }}</td>
                 <td>{{ $supplier->phone }}</td>
                 <td>{{ $supplier->address }}</td>
                 <td>{{ $supplier->city }}</td>
                 <td>{{ $supplier->type }}</td>
                <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/supplier/'.$supplier->photo) }}"
                            style="height: 50px; width: 50px" alt=""></td>
                 
               
                 
    <td class="text-right">

      <form  action="{{ route('supplier.destroy',$supplier->id) }}"  method="POST">
                  @csrf

                   <a href="{{ route('supplier.show',$supplier->id) }}" class="btn btn-info">
                         <i class="fa fa-eye"> Show</i>
                    </a> 
                  <a href="{{ route('supplier.edit',$supplier->id) }}" class="btn btn-info">
                         <i class="fa fa-edit"> Edit</i>
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