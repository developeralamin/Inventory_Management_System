@extends('layouts.app')

@section('content')  


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
  <div class="row page-header">
  	 <div class="col-md-6">
       <a href="{{ route('customer.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
  	 </div>
  </div>

<!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><strong><h4>{{ $customer->name }}'s</h4></strong>  Information</h6>
      </div>
  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

              <tr>
                <th class="text-right">Name : </th>
                <td>{{ $customer->name }}</td>
              </tr>

              <tr>
                <th class="text-right">Email : </th>
                <td>{{ $customer->email }}</td>
              </tr>

              <tr>
                <th class="text-right">Phone : </th>
                <td>{{ $customer->phone }}</td>
              </tr>

              <tr>
                <th class="text-right">Address : </th>
                <td>{{ $customer->address }}</td>
              </tr>

              <tr>
                <th class="text-right">Shopname : </th>
                <td>{{ $customer->shopname }}</td>
              </tr>

               <tr>
                <th class="text-right">City : </th>
                <td>{{ $customer->city }}</td>
              </tr>

               <tr>
                <th class="text-right">Account Holder : </th>
                <td>{{ $customer->acount_holder }}</td>
              </tr>

               <tr>
                <th class="text-right">Acount Number : </th>
                <td>{{ $customer->acount_number }}</td>
              </tr>

               <tr>
                <th class="text-right">Bank Name : </th>
                <td>{{ $customer->bank_name }}</td>
              </tr>

               <tr>
                <th class="text-right">Bank Branch : </th>
                <td>{{ $customer->bank_branch }}</td>
              </tr>
              <tr>
             <td class="text-right"><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/customer/'.$customer->photo) }}"
                            style="height: 300px; width: 300px" alt=""></td>
            </tr>
          </table>


        </div>
      </div>
     



   </div>
 </div>

@endsection