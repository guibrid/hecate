@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
  <p>
    <a href="{{ url('admin/orders/create') }}" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new order</a>
  </p>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Orders</h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          @include('admin.orders.inc.ordersTable', ['orders' => $orders])
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
        $('#ordersTable-responsive').DataTable( {
            "order": []
        });
      });
    </script>
@stop





    
