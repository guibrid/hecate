@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <p>
      <a href="{{ url('admin/shipments/create') }}" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new shipment</a>
    </p>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Shipments</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="shipments-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Doc reception</th>
                  <th>Custom control</th>
                  <th>Cutoff</th>
                  <th>Container #</th>
                  <th>Transshipments</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
                @foreach ($shipments as $shipment)
                <tr>
                  <td>{{$shipment->number}}</td>
                  <td>{{$shipment->title}}</td>
                  <td>@if ($shipment->document_reception) {{\Carbon\Carbon::parse($shipment->document_reception)->format('d/m/Y')}} @endif</td>
                  <td>@if ($shipment->custom_control) {{\Carbon\Carbon::parse($shipment->custom_control)->format('d/m/Y')}} @endif</td>
                  <td>@if ($shipment->cutoff) {{\Carbon\Carbon::parse($shipment->cutoff)->format('d/m/Y')}} @endif</td>
                  <td>{{$shipment->container_number}}</td>
                  <td>
                    @foreach(Helpers::getTransshipments($shipment->id) as $transshipment)
                      {!! Helpers::transshipmentIcon($transshipment['type'])!!} 
                      {{ $transshipment['origin']['abbreviation']}}-
                      {{ \Carbon\Carbon::parse($transshipment['departure'])->format('d/m/Y')}}
                      <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      {{ $transshipment['destination']['abbreviation']}}-
                      {{ \Carbon\Carbon::parse($transshipment['arrival'])->format('d/m/Y')}}<br />
                    @endforeach 
                  </td>
                  <td>
                    {{ Form::open(['method'=>'DELETE', 'route'=>['shipment.delete', $shipment->id]]) }}
                      <a href="{{ URL::route('shipment.edit', $shipment->id) }}" type="button" class="btn btn-primary btn-xs">edit</a> 
                    {{ Form::submit('Del', ['class' => 'btn btn-danger btn-xs']) }} {{ Form::close() }}
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
        $('#shipments-responsive').DataTable();
      });
    </script>

@stop





    
