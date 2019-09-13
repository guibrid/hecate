<div class="modal fade bs-example-modal-lg" id="packModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="addPackForm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Pack</h4>
            </div>
            <div class="modal-body form-horizontal form-label-left">

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <p><small>* indicates required field</small></p>
                        <div class="form-group">
                            {!! Form::label('type', 'Type of pack*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::select('type', config('variables.form.packTypes'), ['PKG'], ['id'=>'type', 'class'=>'form-control col-md-7 col-xs-12', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('packNumber', 'Number of packs*', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('packNumber', null, ['id'=>'packNumber', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder' => 'Ex: 4', 'required' => 'required']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('inner_packs', 'Inner packs', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('inner_packs', 1, ['id'=>'inner_packs', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('length', 'Length', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group'>
                                {!! Form::text('length', null, ['id'=>'length', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                    <span class="input-group-addon">Meters</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('width', 'Width', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group'>
                                {!! Form::text('width', null, ['id'=>'width', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                    <span class="input-group-addon">Meters</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('height', 'Height', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group'>
                                {!! Form::text('height', null, ['id'=>'height', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                    <span class="input-group-addon">Meters</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('weight', 'Weight', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group'>
                                {!! Form::text('weight', null, ['id'=>'weight', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                    <span class="input-group-addon">Kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('volume', 'Volume', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class='input-group'>
                                {!! Form::text('volume', null, ['id'=>'volume', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                    <span class="input-group-addon">m3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('description', 'Goods description', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
            
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                {!! Form::text('description', null, ['id'=>'description', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div id="packAlert" class="alert alert-danger hide" role="alert"></div>
                    </div>
                </div>

                <div class="ln_solid"></div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="registerPack">Add pack</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
                
    </div>
</div>
