@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Schedules</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['AccountController@update', $account->id], 
'method' => 'patch', 
'files' => true,
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2']) !!}

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_content">
                
                <!-- Content-->
                <div class="x_title">
                    <h2>Current schedule</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    @if (empty($account->schedule_file))
                        <p>No schedules uploaded</p>
                    @else
                        @php $date = Helpers::getAccountScheduledate($account->schedule_file) @endphp
                        <p>Last update {{$date['update']}}</p>
                        @if (!empty($date['sent']))
                            <p>Sent the {{$date['sent']}}</p>
                        @else 
                            <p>Will be sent Monday with the order recap</p>
                        @endif
                    @endif
                </div>
                <!-- End content-->

                <div class="x_title">
                        <h2>Upload new schedule</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        {!! Form::file('schedule_file'); !!}
                        <span class="small">* maximun size 3Mb</span><br />
                        {!!Form::submit('Upload', ['class' => 'btn btn-success triggerOverlay']) !!}
                    </div>
                    <!-- End content-->
            </div>
        </div>
    </div>
</div>

<!-- End section -->

{!! Form::close() !!}

@endsection

<!-- CSS require for this view -->
@section('viewCSS')

@stop

<!-- Script require for this view -->
@section('viewScripts')

@stop






    
