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
                               <a href="{{ route('product.create') }}" class="pull-left panel-title btn btn-info ">Add Product</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Product</h3>
             
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Code</th>
                      <th>Selling Price</th>
                      <th>P.Image</th>
                      <th>Garage</th>
                      <th>Route</th>
                      
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($product as $key=>$product)

             <tbody>
                <tr>

                 <td>{{ $key+1 }}</td>
                 <td>{{ $product->product_name }}</td>
                 <td>{{ $product->product_code }}</td>
                 <td>{{ $product->selling_price }}</td>
                  <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/product/'.$product->product_image) }}"
                            style="height: 50px; width: 50px" alt=""></td>
                 <td>{{ $product->product_garage }}</td>
                 <td>{{ $product->product_route }}</td>
               

    <td class="text-right">

      <form  action="{{ route('product.destroy',$product->id) }}"  method="POST">
                  @csrf

                   <a href="{{ route('product.show',$product->id) }}" class="btn btn-info">
                         <i class="fa fa-eye">Show</i>
                    </a> 
                  <a href="{{ route('product.edit',$product->id) }}" class="btn btn-info">
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