<div class="modal fade bs-example-modal-lg" id="transshipmentModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Transshipment</h4>
                </div>
                <div class="modal-body form-horizontal form-label-left">
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                                <p><small>* indicates required field</small></p>
                            <div class="form-group">
                                {!! Form::label('type', 'Type*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('type', ['sea'=> 'Sea','air'=>'Air'], null, ['id'=>'type', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: Sea or Air...']) !!}
                                    @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('origin_place', 'Origin*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('origin_place', [],null, ['id'=>'origin_place', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                    @error('type')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                                <div class="form-group">
                                        {!! Form::label('departure', 'Departure date*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class='input-group date' id='datetimepickerdeparture'>
                                                {!! Form::text('departure', null, ['id'=>'departure', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                            </div>
                                            @error('arrival')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('destination_place', 'Destination*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::select('destination_place', [], null, ['id'=>'destination_place', 'class'=>'form-control col-md-7 col-xs-12','disabled' => 'disable']) !!}
                                    @error('destination_place')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('arrival', 'Arrival date*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class='input-group date' id='datetimepickerarrival'>
                                        {!! Form::text('arrival', null, ['id'=>'arrival', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    @error('arrival')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('vessel', 'Vessel*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('vessel', null, ['id'=>'vessel', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: CMA CGM Bleriot...']) !!}
                                    @error('vessel')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('comment', 'Comment', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::textarea('comment', null, ['class' => 'resizable_textarea form-control', 'rows' => 3, 'id' => 'comment-transshipment']) !!}
                                    @error('comment')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="row">
                        <div class="col-md-12">

                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="registerTransshipment">Add transshipment</button>
                        </div>
                    </div>
                </div>
            </div>
                    
        </div>
    </div>
