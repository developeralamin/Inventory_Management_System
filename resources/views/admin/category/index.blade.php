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
                               <a href="{{ route('category.create') }}" class="pull-left panel-title btn btn-info ">Add Category</a>
                            </div>
                        
                            
                        </div>

<div class="row">
     <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Category</h3>
             
            </div>

     <div class="panel-body">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
             <table id="usetable" class="table table-striped table-bordered">
                 <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th class="text-center">Actions</th>
                    </tr>
                </thead>

         @foreach ($category as $key=>$category)

             <tbody>
                <tr>
                 <td>{{ $key+1 }}</td>
                 <td>{{ $category->category_name }}</td>
         
    <td class="text-right">

      <form  action="{{ route('category.destroy',$category->id) }}"  method="POST">
                  @csrf

                  <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info">
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

