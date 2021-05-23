@extends('layouts.app')

@section('content')  


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
  <div class="row page-header">
  	 <div class="col-md-6">
       <a href="{{ route('supplier.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
  	 </div>
  </div>

<!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $supplier->name }}'s</strong> Information</h6>
      </div>
  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

              <tr>
                <th class="text-right">Name : </th>
                <td>{{ $supplier->name }}</td>
              </tr>

              <tr>
                <th class="text-right">Email : </th>
                <td>{{ $supplier->email }}</td>
              </tr>

              <tr>
                <th class="text-right">Phone : </th>
                <td>{{ $supplier->phone }}</td>
              </tr>

              <tr>
                <th class="text-right">Address : </th>
                <td>{{ $supplier->address }}</td>
              </tr>

              <tr>
                <th class="text-right">Supplier Type : </th>
                <td>{{ $supplier->type }}</td>
              </tr>

               <tr>
                <th class="text-right">Shop : </th>
                <td>{{ $supplier->shop }}</td>
              </tr>


               <tr>
                <th class="text-right">City : </th>
                <td>{{ $supplier->city }}</td>
              </tr>

               <tr>
                <th class="text-right">Acount Holder : </th>
                <td>{{ $supplier->acountholder }}</td>
              </tr>

               <tr>
                <th class="text-right">Account Number : </th>
                <td>{{ $supplier->acountnumber }}</td>
              </tr>

              <tr>
                <th class="text-right">Bank Name : </th>
                <td>{{ $supplier->bankname }}</td>
              </tr>

              <tr>
                <th class="text-right">Bank Branch : </th>
                <td>{{ $supplier->bankbranch }}</td>
              </tr>

              <tr>
             <td class="text-right"><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/supplier/'.$supplier->photo) }}"
                            style="height: 300px; width: 300px" alt=""></td>
             </tr>
          </table>


        </div>
      </div>
     



   </div>
 </div>

@endsection