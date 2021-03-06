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
                  <th>Consol #</th>
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
                    @foreach($shipment->transshipments as $transshipment)
                      {!! Helpers::transshipmentIcon($transshipment->type)!!} 
                      {{ $transshipment->origin->title}} -
                      {{ \Carbon\Carbon::parse($transshipment->departure)->format('d/m/Y')}}
                      <i class="fa fa-arrow-right" aria-hidden="true"></i>
                      {{ $transshipment->destination->title}} -
                      {{ \Carbon\Carbon::parse($transshipment->arrival)->format('d/m/Y')}}<br />
                    @endforeach 
                  </td>
                  <td>
                      {{ Form::open(['method'=>'DELETE', 'route'=>['shipment.delete', $shipment->id]]) }}
                        <a href="{{ URL::route('shipment.edit', $shipment->id) }}" type="button" class="btn btn-primary btn-xs">edit</a> 
                        <input class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this shipment?');" type="submit" value="Del"> 
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
        $('#shipments-responsive').DataTable({
            "order": []
        });
      });
    </script>

@stop





    
