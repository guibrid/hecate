<div class="modal fade bs-example-modal-lg" id="createUserModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
    
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create new user</h4>
                </div>
                <div class="modal-body">
                            {!! Form::open(['action' => ['UserController@store'], 
                            'method' => 'post', 
                            'class' => 'form-horizontal form-label-left']) !!}
                            @csrf
                            {!! Form::hidden('customer_id', $customer->id) !!}
                            
                            <div class="form-group">

                                {!! Form::label('name', 'Name', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('name', null, ['id'=>'name', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Ex: John Doe...', 'require' =>'required']) !!}
                                    @error('name')
                                        <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>
    
                            </div>
                            
                            <div class="form-group">
                                {!! Form::label('email', 'Email', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']) !!}
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    {!! Form::text('email', null, ['id'=>'email', 'class'=>'form-control col-md-7 col-xs-12', 'placeholder'=>'Ex: john.doe@hecate.com...', 'require' =>'required']) !!}
                                    @error('email')
                                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                    @enderror
                                </div>
                            </div>
                        
                    <div class="ln_solid"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="registerUser">Save user</button>
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>