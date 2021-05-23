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
                               <a href="{{ route('take.attendance') }}" class="pull-right panel-title btn btn-danger ">Take Attendance</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-7">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Attendance</h3>
             
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Attendance</th>
                      <th>Actions</th>
                    </tr>
                </thead>

         @foreach ($all_atendnece as $key=>$all_atendnece)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $all_atendnece->edit_date }}</td>
         
    <td>

      <form  action="{{ url('category.destroy',$all_atendnece->edit_date) }}"  method="POST">
                  @csrf

                <a href="{{ url('/view_attendance',$all_atendnece->edit_date) }}" class="btn btn-info">
                         <i class="fa fa-eye"> View</i>
                 </a> 

                  <a href="{{ url('/edit_attendance',$all_atendnece->edit_date) }}" class="btn btn-info">
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

