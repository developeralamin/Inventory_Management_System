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
	                        <div class="pull-left">
	                            <h4 class="text-right">EcoVel IT</h4>
	                            
	                        </div>
	                        <div class="pull-right">
	                            <h4>Invoice # <br>
	                                <strong>{{ date('d/m/y') }}</strong>
	                            </h4>
	                        </div>
	                    </div>
	                    <hr>
    <div class="row">
        <div class="col-md-12">
            
            <div class="pull-left m-t-30">
                <address>

                  <strong>Name: {{ $customer->name }}</strong><br>
                  <strong>ShopName: {{ $customer->shopname }}</strong><br>
                  <strong>Address: <b>{{ $customer->address }}</b> </strong><br>
                  <strong>City: <b>{{ $customer->city }}</b> </strong><br>
                  <strong>Phone: <b>{{ $customer->phone }}</b> </strong><br>
                  
                  </address>
            </div>
            <div class="pull-right m-t-30">
                <p><strong>Order Date: </strong> {{ date("l jS \of F Y ") }}</p>
                <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                <p class="m-t-10"><strong>Order ID: </strong> #123456</p>
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
                <th>Item</th>
                <th>Quantity</th>
                <th>Unit Cost</th>
                <th>Total</th>
              
            </tr></thead>
            <tbody>
   			@php
   				$sl=1;
   			@endphp
            	@foreach($contents as $cont)

                <tr>
                    <td>{{ $sl++ }}</td>
                    <td>{{ $cont->name }}</td>
                    <td>{{ $cont->qty }}</td>
                    <td>{{ $cont->price }}</td>
                    <td>{{ $cont->price*$cont->qty}}</td>
                    
                </tr>
                @endforeach()
            </tbody>
        </table>
    </div>
        </div>
    </div>
    <div class="row" style="border-radius: 0px;">
        <div class="col-md-3 col-md-offset-9">
            <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal() }}</p>
            <p class="text-right">VAT: {{ Cart::tax() }}</p>
            <hr>
            <h3 class="text-right">Total : {{ Cart::total() }}</h3>
        </div>
    </div>
    <hr>
    <div class="hidden-print">
        <div class="pull-right">
            <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
            <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
        </div>
    </div>
</div>
</div>

</div>

</div>



	</div> <!-- container -->
	           
	</div> <!-- content -->
	</div>


  @endsection