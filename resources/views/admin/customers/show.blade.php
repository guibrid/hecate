@extends('layouts.app')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">

  <div class="page-title">
    <h3>{{$customer->name}}</h3>
  </div>


  <div class="row tile_count">
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-cubes"></i> Current Volume</span>
      <div class="count">23,343</div>
      <span class="count_bottom">M3</span>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-dashboard"></i>  Current Weight</span>
      <div class="count">33,454</div>
      <span class="count_bottom">Kg</span>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-clone"></i> Current orders</span>
      <div class="count">{{$customer->orders->count()}}</div>
      <span class="count_bottom">order on proccess</span>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-6 tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
      <div class="count">{{$customer->users->count()}}</div>
      <span class="count_bottom">users registered</span>
    </div>



  </div>


  <div class="x_panel">

    <div class="x_title">
      <h2>Find all details for {{$customer->name}}</h2>
      <div class="clearfix"></div>
    </div>

    <div class="x_content">

      <div class="" role="tabpanel" data-example-id="togglable-tabs">

        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Orders</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Users</a>
          </li>
          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Profile</a>
          </li>
        </ul>

        <div id="myTabContent" class="tab-content">
          <!-- Order Tab Begin -->
          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
            
            @include('admin.orders.inc.ordersTable', ['orders' => $orders])

          </div>
          <!-- Order Tab End -->

          <!-- User Tab Begin -->
          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

              @include('admin.users.inc.usersTable', ['users' => $customer->users])

          </div>
          <!-- User Tab End -->

          <!-- Profile Tab Begin -->
          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
            {!! Form::open(['action' => ['CustomerController@update', $customer->id], 
            'method' => 'patch', 
            'class' => 'form-horizontal form-label-left', 
            'id' => 'demo-form2']) !!}
            
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
                {!! Form::label('country', 'Country *', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}

                <div class="col-md-6 col-sm-6 col-xs-12">
                    {!! Form::select('country', config('variables.form.countries'), $customer->country, ['placeholder' => 'Select country...','id' => 'country', 'class' => 'form-control col-md-7 col-xs-12']) !!}
                    @error('country')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <p><small>* indicates required field</small></p>
                    {!! Form::submit('Update customer', ['class' => 'btn btn-success triggerOverlay']) !!}
                    <br /><br />  <br />           
                </div>
            </div>
            
            {!! Form::close() !!}

          </div>
          <!-- Profile Tab End -->

        </div><!-- End tabpanel -->

      </div><!-- End myTabContent -->

    </div><!-- End x_content -->

  </div><!-- End x_panel -->
</div> <!-- End Row -->
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
        $('#usersTable-responsive, #ordersTable-responsive').DataTable({
          "bLengthChange": false,
          "info":     false
        });
      });
    </script>

@stop





    
