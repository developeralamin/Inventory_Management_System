@extends('layouts.app')

@section('content')
	<div class="content-page">
	<!-- Start content -->
	<div class="content">
	<div class="container">

 	

	    <!-- Page-Title -->
	    <div class="row">
	        <div class="col-sm-12">
	            <h4 class="pull-left page-title">Invoice</h4>
	            <ol class="breadcrumb pull-right">
	                <li><a href="{{ route('pos') }}" class="btn btn-sm btn-info">Back POS</a></li>
	                <li><a href="#">Pages</a></li>
	                <li class="active">Invoice</li>
	            </ol>
	        </div>
	    </div>

	    <div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <!-- <div class="panel-heading">
	                    <h4>Invoice</h4>
	                </div> -->
	                <div class="panel-body">
	                    <div class="clearfix">
	         
	                        <div class="pull-right">
	                            <h4>Order Date <br>
	                                <strong>{{ $order->order_date }}</strong>
	                            </h4>
	                        </div>
	                    </div>
	                    <hr>
    <div class="row">
        <div class="col-md-12">
            
            <div class="pull-left m-t-30">
                <address>

                  <strong>Name: {{ $order->name }}</strong><br>
                  <strong>ShopName: {{ $order->shopname }}</strong><br>
                          Address: <b>{{ $order->address }}</b> <br>
                         City: <b>{{ $order->city }}</b> <br>
                         Phone: <b>{{ $order->phone }}</b> <br>
                  
                  </address>
            </div>
            <div class="pull-right m-t-30">
                <p><strong>Order Date: </strong> {{ date("l jS \of F Y ") }}</p>
                {{-- <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink"></span></p> --}}
                <p class="m-t-10"><strong>Order ID: </strong>
                  {{ $order->id }}</p>
            </div>
        </div>
    </div>
<div class="m-h-50"></div>
<div class="row">
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table m-t-30">
            <thead>
                <tr><th>#</th>
                <th>Product Name</th>
                <th>Product Code</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total</th>
              
            </tr></thead>
            <tbody>
   			@php
   				$sl=1;
   			@endphp
            	@foreach($order_details as $cont)

                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $cont->product_name }}</td>
                    <td>{{ $cont->product_code }}</td>
                    <td>{{ $cont->quantity }}</td>
                    <td>{{ $cont->unitcost }}</td>
                    <td>{{ $cont->unitcost*$cont->quantity}}</td>
                    
                </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
        </div>
    </div>
    <div class="row" style="border-radius: 0px;">
       <div class="col-md-9">
         <h3>Payment By : {{ $order->payment_status }}</h3> 
         <h4>Pay : {{ $order->pay }}</h4> 
         <h5>Due : {{ $order->due }}</h5> 
       </div>
        <div class="col-md-3 ">
            <p class="text-right"><b>Sub-total:</b> {{ $order->subtotal }}</p>
            <p class="text-right">VAT: {{ $order->vat }}</p>
            <hr>
            <h3 class="text-right">Total : {{ $order->total }}</h3>
        </div>
    </div>
    <hr>
    @if($order->order_status == 'success')
    @else
    <div class="hidden-print">
        <div class="pull-right">
            <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
            <a href="{{ url('/pos_done/'.$order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
        </div>
    </div>
    @endif
</div>
</div>

</div>

</div>



	</div> <!-- container -->
	           
	</div> <!-- content -->
	</div>


<!--invoice details here-->


{{-- <form class="cmxform form-horizontal tasi-form" method="post" 
            action="{{  route('final_invoice')  }}" >
            @csrf

            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog"> 
            <div class="modal-content"> 
            <div class="modal-header"> 
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
            <h4 class="modal-title text-success">Invoice Of {{ $customer->name }}</h4> 
            <h4 class="modal-title text-danger pull-center">Total : {{ Cart::total() }}</h4> 
            </div> 
            <div class="modal-body"> 
            <div class="row"> 
	            <div class="col-md-4"> 
	            <div class="form-group"> 
	            <label for="field-1" class="control-label">Payment</label> 
	             
	             <select name="payment_status" class="form-control">
	             	<option value="Handcash">Handcash</option>
	             	<option value="Cheque">Cheque</option>
	             	<option value="Due">Due</option>
	             	
	             </select>

	            </div> 
	            </div> 
            <div class="col-md-4"> 
            <div class="form-group"> 
               <label for="field-2" class="control-label">Pay</label> 
                <input class="form-control"  name="pay" type="text"> 
            </div> 
            </div> 

        <div class="col-md-4"> 
            <div class="form-group"> 
             <label for="field-3" class="control-label">Due</label> 
             <input class=" form-control"  name="due" type="text">
            </div> 
         </div> 

         <input type="hidden" name="customer_id" value="{{ $customer->id }}">
         <input type="hidden" name="order_date" value="{{ date('m/d/y') }}">
         <input type="hidden" name="order_status" value="pending">
         <input type="hidden" name="total_product" value="{{ Cart::count() }}">
         <input type="hidden" name="subtotal" value="{{ Cart::subtotal() }}">
         <input type="hidden" name="vat" value="{{ Cart::tax() }}">
         <input type="hidden" name="total" value="{{ Cart::total() }}">
  


            </div> 
            <div class="modal-footer"> 
            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
            <button type="submit" class="btn btn-info waves-effect waves-light">Save changes</button> 
            </div> 

            </div> 
            </div>
            </div><!-- /.modal -->    

              </form> 
            --}}

  @endsection