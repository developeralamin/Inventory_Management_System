@extends('layouts.app')

@section('content')  


            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
  <div class="row page-header">
  	 <div class="col-md-6">
       <a href="{{ route('employee.index') }}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
  	 </div>
  </div>

<!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><strong>{{ $employee->name }}'s</strong> Information</h6>
      </div>
  <div class="card-body user_show">

      <div class="row justify-content-md-center">
        <div class="col-md-8">
          <table class="table table-borderless table-striped table-hover mt-4">

              <tr>
                <th class="text-right">Name : </th>
                <td>{{ $employee->name }}</td>
              </tr>

              <tr>
                <th class="text-right">Email : </th>
                <td>{{ $employee->email }}</td>
              </tr>

              <tr>
                <th class="text-right">Phone : </th>
                <td>{{ $employee->phone }}</td>
              </tr>

              <tr>
                <th class="text-right">Address : </th>
                <td>{{ $employee->address }}</td>
              </tr>

              <tr>
                <th class="text-right">Experience : </th>
                <td>{{ $employee->experience }}</td>
              </tr>

               <tr>
                <th class="text-right">NID NO. : </th>
                <td>{{ $employee->nid_no }}</td>
              </tr>

               <tr>
                <th class="text-right">Vacation : </th>
                <td>{{ $employee->vacation }}</td>
              </tr>

               <tr>
                <th class="text-right">City : </th>
                <td>{{ $employee->city }}</td>
              </tr>
               <tr>
                <th class="text-right">Salary : </th>
                <td>{{ $employee->salary }}-/tk</td>
              </tr>
              <tr> 
             <td class="text-right"><img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/employee/'.$employee->photo) }}"
                            style="height: 300px; width: 300px" alt=""></td>
              </tr>
          </table>


        </div>
      </div>
     



   </div>
 </div>

@endsection