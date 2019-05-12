@extends('layouts.app')

@section('content')
<div class="col-md-12 col-sm-12 col-xs-12">
    <p>
      <a href="{{ url('admin/places/create') }}" class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Create new port/airport</a>
    </p>
  </div>
  <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Ports & airports</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">

          <table id="places-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Code</th>
                  <th>Type</th>
                  <th>Country</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($places as $place)
                <tr>
                    <td>{{$place->title}}</td>
                    <td>{{$place->abbreviation}}</td>
                    <td align="center">{!!Helpers::transshipmentIcon($place->type, 2)!!}</td>
                    <td>{{$place->country}}</td>
                    <td>
                      <a href="{{ URL::route('place.edit', $place->id) }}" type="button" class="btn btn-primary btn-xs">edit</a> 
                      @if (auth()->user()->authorizeDisplay(['admin']))
                      {{ Form::open(['method'=>'DELETE', 'route'=>['place.delete', $place->id]]) }}
                        <input class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this place?');" type="submit" value="Del">
                      {{ Form::close() }}
                      @endif
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
        $('#places-responsive').DataTable();
      });
    </script>

@stop





    
