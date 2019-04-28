@extends('layouts.app')

@section('content')
<div class="page-title">
    <div class="title_left">
        <h3>Edit order</h3>
    </div>
</div>

<div class="clearfix"></div>
{!! Form::open(['action' => ['OrderController@update', $order->id], 
'method' => 'patch', 
'class' => 'form-horizontal form-label-left', 
'id' => 'demo-form2',
'files' => true]) !!}

{!! Form::hidden('customer_id', $order->customer_id, ['id'=>'customer_id']) !!}

{!! Form::hidden('customer', $order->customer->name, ['id'=>'customer']) !!}
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

        <div class="x_content">
                <p><small>* indicates required field</small></p>
                    <!-- Content-->
                    <div class="row">
                            <div class="col-md-6 col-xs-12">
                                <div class="x_title">
                                    <h2>Order details</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td>Status *</td>
                                        <td>
                                            {!! Form::text('status_id', $order->status_id, ['id'=>'status_id', 'class'=>'form-control']) !!}
                                            @error('number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Order number *</td>
                                        <td>
                                            {!! Form::text('number', $order->number, ['id'=>'number', 'class'=>'form-control', 'placeholder' => 'Ex: Title for you order...']) !!}
                                            @error('number')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>
                                            {!! Form::text('title', $order->title, ['id'=>'title', 'class'=>'form-control', 'placeholder' => 'Ex: Title for you order...']) !!}
                                            @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Supplier *</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('supplier', $order->supplier, ['id'=>'supplier', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('supplier')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Recipient *</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('recipient', $order->recipient, ['id'=>'recipient', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('recipient')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Batch n°</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('batch', $order->batch, ['id'=>'batch', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('batch')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Loading</td>
                                        <td class="fs15 fw700 text-right">
                                            {!! Form::text('load', $order->load, ['id'=>'load', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                            @error('load')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td># of packages</td>
                                        <td class="fs15 fw700 text-right">
                                                {!! Form::text('package_number', $order->package_number, ['id'=>'package_number', 'class'=>'form-control col-md-7 col-xs-12']) !!}
                                                @error('package_number')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Weight</td>
                                        <td class="fs15 fw700 text-right">
                                            <div class="input-group">
                                                {!! Form::text('weight', $order->weight, ['id'=>'weight', 'class'=>'form-control col-md-7 col-xs-12', 'aria-describedby'=>'weightaddon', 'placeholder' => 'Ex: 235']) !!}
                                                <span class="input-group-addon" id="weightaddon">Kg</span>
                                            </div>
                                            @error('weight')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Volume</td>
                                        <td class="fs15 fw700 text-right">
                                            <div class="input-group">
                                                {!! Form::text('volume', $order->volume, ['id'=>'volume', 'class'=>'form-control col-md-7 col-xs-12', 'aria-describedby'=>'volumeaddon', 'placeholder' => 'Ex: 1.234']) !!}
                                                <span class="input-group-addon" id="volumeaddon">m3</span>
                                            </div>
                                                @error('volume')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                            </div>
                            <div class="col-md-6 col-xs-12">
                                <div class="x_title">
                                    <h2>Documents</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    
                                    <p>No document available for the moment</p>
                                
    
                                  
                                </div>
                            </div>
                        </div>
                        <div class="hidden-small"><br /><br /></div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="x_title">
                                <h2>Shipping details</h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <div class="row">
    
                                    
                                        <div class="col-md-12">
                                            <p>No shipment has been registered yet for this order.</p>
                                        </div>
    
                                    
    
                                </div>
                            </div>                                            
                                  
                              
                          </div>
                        </div>
                        <div class="hidden-small"><br /><br /></div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="x_title">
                                <h2>Comments</h2>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                    {!! Form::textarea('comment', $order->comment, ['class' => 'resizable_textarea form-control', 'rows' => 3, 'id' => 'comment', 'placeholder' =>'Your comments here...']) !!}
                                    @error('comment')
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

<!-- End Document section -->
<!--<div class="ln_solid"></div>-->
<div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"> 
                <br />
            <p>
                {!! Form::checkbox('notification', 'send_notification', true, ['class' => 'js-switch']) !!} 
                Send notification to customer   
            </p>
        </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        {!! Form::submit('Update your order', ['class' => 'btn btn-success']) !!}
        <br /><br />  <br />           
    </div>
</div>

{!! Form::close() !!}

@endsection

<!-- CSS require for this view -->
@section('viewCSS')
    <!-- Switchery -->
    <link href="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
@stop

<!-- Script require for this view -->
@section('viewScripts')
    <!-- Switchery -->
    <script src="{{ asset('bower_components/gentelella/vendors/switchery/dist/switchery.min.js')}}"></script>

@stop
