@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <p>
      <a href="{{ url('admin/users/create') }}" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new user</a>
    </p>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Users</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="users-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>email</th>
                  <th>tel</th>
                  <th>Customer</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
        
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel}}</td>
                    <td>{{$user->customer['name']}}</td>
                    <td>
                      {{ Form::open(['method'=>'DELETE', 'route'=>['user.delete', $user->id]]) }}
                        <a href="{{ URL::route('user.edit', $user->id) }}" type="button" class="btn btn-primary btn-xs">edit</a>
                        <input class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');" type="submit" value="Del">
                      {{ Form::close() }}
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

        </div>
    </div>
</div>

@endsection

<!-- CSS require for this view -->
@section('viewCSS')
    <!-- Datatables -->
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
@stop

<!-- Script require for this view -->
@section('viewScripts')
    <!-- Datatables -->
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>

    <script>
      $(document).ready(function() {
        $('#users-responsive').DataTable();
      });
    </script>

@stop





    
