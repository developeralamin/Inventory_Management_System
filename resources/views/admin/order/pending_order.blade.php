@extends('layouts.app')
@section('content')

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <!-- Page-Title -->
                        <div class="row">
                            @if(session('message'))
                             <div class="alert alert-success" role="alert">
                              {{ session('message') }}
                            </div>
                           @endif
                                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Pending Order</h3>
             
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Date</th>
                      <th>Quantity</th>
                      <th>Payment Status</th>
                      <th>Total Amount</th>
                      <th>Order Status</th>
                      
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($order as $key=>$order)

             <tbody>
                <tr>

                 <td>{{ $key+1 }}</td>
                 <td>{{ $order->name }}</td>
                 <td>{{ $order->order_date }}</td>
                 <td>{{ $order->total_product }}</td>
                 <td>{{ $order->payment_status }}</td>
                 <td>{{ $order->total }}</td>
                 <td class="badge badge-danger">{{ $order->order_status }}</td>
               

    <td class="text-right">
                   <a href="{{ url('view_order_status/'.$order->id) }}" class="btn btn-info">
                         <i class="fa fa-eye">View</i>
                    </a>                                  
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