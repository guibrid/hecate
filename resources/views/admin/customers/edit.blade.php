@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Edit customer</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['CustomerController@update', $customer->id], 
'method' => 'patch', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2']) !!}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- Content-->
                <div class="x_title">
                    <h2>Customer details</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <p><small>* indicates required field</small></p>
                    <div class="form-group">
                        {!! Form::label('name', 'Company name *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('name', $customer->name, ['id'=>'name', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('address', 'Address', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('address',  $customer->address, ['id'=>'address', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('city', 'City', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('city',  $customer->city, ['id'=>'city', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('cp', 'CP', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::text('cp',  $customer->cp, ['id'=>'cp', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            @error('cp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        {!! Form::label('country', 'Country', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
        
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! Form::select('country', config('variables.form.countries'), $customer->country, ['placeholder' => 'Select country...','id' => 'country', 'class' => 'form-control col-md-7 col-xs-12']) !!}
                            @error('country')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- End content-->
            </div>
        </div>
    </div>
</div>


<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    
                    <!-- Content-->
                    <div class="x_title">
                        <h2>{{$customer->name}} user list</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                            <p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createUserModal"><i class="fa fa-plus"></i> Add user</button>
                                </p>
                                <table id="userList-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer->users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td> 
                                                <a href="{{ URL::route('user.delete', $user->id) }}" type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this user?');">Del</button>
                                            </td>
                                          </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                    </div>
                    <!-- End content-->
                </div>
            </div>
        </div>
    </div>

<!-- End section -->

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::submit('Update customer', ['class' => 'btn btn-success triggerOverlay']) !!}
        <br /><br />  <br />           
    </div>
</div>

{!! Form::close() !!}

@include('admin.customers.modal.createUser')

@endsection

<!-- CSS require for this view -->
@section('viewCSS')
    <!-- Datatables -->
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('bower_components/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">
@stop

<!-- Script require for this view -->
@section('viewScripts')
    <!-- iCheck -->
    <script src="{{ asset('bower_components/gentelella/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Datatables -->
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{ asset('bower_components/gentelella/vendors/pdfmake/build/vfs_fonts.js')}}"></script>

    <script>
      $(document).ready(function() {

        if(getURLParameter('user') == 'add')
            $('#createUserModal').modal('show');

        $('#userList-responsive').DataTable();

      });

      function getURLParameter(name) {
        return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
      }
    </script>

@stop






    
