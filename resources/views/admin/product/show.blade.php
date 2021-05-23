@extends('layouts.app')

@section('content')  


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
  <div class="row page-header">
  	 <div class="col-md-6">
       <a href="{{ route('product.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
  	 </div>
  </div>

<!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $product->product_name }}'s</strong> Information</h6>
      </div>
  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

         <tr class="text-right">
            <td><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/product/'.$product->product_image) }}"
                            style="height: 300px; width: 300px" alt=""></td>
             
          </tr>

              <tr>
                <th class="text-right">Product Name : </th>
                <td>{{ $product->product_name }}</td>
              </tr>

              <tr>
                <th class="text-right">Category : </th>
                <td>{{ $product->category_name }}</td>
              </tr>

              <tr>
                <th class="text-right">Supplier : </th>
                <td>{{ $product->name }}</td>
              </tr>

              <tr>
                <th class="text-right">Product Code : </th>
                <td>{{ $product->product_code }}</td>
              </tr>

              <tr>
                <th class="text-right">Ghoudaowun : </th>
                <td>{{ $product->product_garage }}</td>
              </tr>

               <tr>
                <th class="text-right">Product Route : </th>
                <td>{{ $product->product_route }}</td>
              </tr>

               <tr>
                <th class="text-right">Buy Date : </th>
                <td>{{ $product->buy_date }}</td>
              </tr>

               <tr>
                <th class="text-right">Expire Date : </th>
                <td>{{ $product->expire_date }}</td>
              </tr>
               <tr>
                <th class="text-right">Buying Price : </th>
                <td>{{ $product->buying_price }}-/tk</td>
              </tr>

              <tr>
                <th class="text-right">Selling Price : </th>
                <td>{{ $product->selling_price }}-/tk</td>
              </tr>

             

          </table>


        </div>
      </div>
     



   </div>
 </div>

@endsection