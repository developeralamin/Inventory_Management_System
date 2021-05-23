@extends('layouts.app')

@section('content')

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

         @if(session('error_message'))
             <div class="alert alert-danger" role="alert">
              {{ session('error_message') }}
            </div>
         @endif
                      
        @if(session('message'))
             <div class="alert alert-success" role="alert">
              {{ session('message') }}
            </div>
         @endif

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title"> Take Attendance</h3>
               <a href="{{ route('all.attendance') }}" class="pull-right panel-title btn btn-danger ">All Attendance</a>
               <h2 class="text-center text-success">Today : <span class="text-danger">{{ date('m/d/y') }}</span> </h2>
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table class="table table-striped table-bordered">
                 <thead>
                    <tr>
        
                      <th>Name</th>
                      <th>Photo</th>
                      <th>Attendance</th>
                    </tr>
                </thead>

  @foreach ($employee as $key=>$employee)

    <tbody>
          <form action="{{ url('/insert_attendance') }}" method="post">
                
                @csrf
             
                <tr>

                 <td>{{ $employee->name }}</td>
                <td>
                  <img class="img-responsive img-thumbnail" 
                            src="{{ asset('uploads/employee/'.$employee->photo) }}"
                            style="height: 100px; width: 100px" alt="">
                </td>

                  <input type="hidden" name="user_id[]" value="{{ $employee->id }}">
                 <td>
                   <input type="radio" required name="attendance[{{ $employee->id }}]" value="Present">Present
                   <input type="radio"  required name="attendance[{{ $employee->id }}]" value="Absent">Absent
                 </td>

               <input type="hidden" name="att_date" value="{{ date('m/d/y') }}">

               <input type="hidden" name="att_year" value="{{ date('Y') }}">

               <input type="hidden" name="month" value="{{ date('F') }}">

            </tr>
                
 </tbody>
          @endforeach()
                                           
                                                   
              </table>
<button class="btn btn-success text-center" type="submit">Take Attendance</button> 

</form> 
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