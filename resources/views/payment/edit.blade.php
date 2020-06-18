@extends('layouts.apanel')
@section('content')
<div class="container">
    
    <div class="container">    
        <table class="table table-light">
        <h1>Update Payment</h1>
        <hr>
        {!! Form::open(['action'=> ['PaymentController@update',$payment->id ],'method'=>'POST']) !!}
            
            <div class='form-group'>
                {{form::label('status','Payment Status')}} <br>
                
                {{form::select('status', array
                (
                'Pending' => 'Pending', 'Paid' => 'Paid'),$payment->status
                )}}
            </div>
        <div class="form-row">
            <div class='form-group col-md-4'>
                {{form::label('rent','Rent')}}
                {{form::text('rent',$payment->rent,['class'=>'form-control','placeholder'=>'Rent'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('waterbill','Water Bill')}}
                {{form::text('waterbill',$payment->waterbill,['class'=>'form-control','placeholder'=>'Water Bill'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('electbill','Electric Bill')}}
                {{form::text('electbill',$payment->electbill,['class'=>'form-control','placeholder'=>'Electric Bill'])}}
            </div>
        </div>
        <div class="form-row">
            <div class='form-group col-md-4'>
                {{form::label('services','Service Charge')}}
                {{form::text('services',$payment->services,['class'=>'form-control','placeholder'=>'Service Charge'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('others','Others (if any)')}}
                {{form::text('others',$payment->others,['class'=>'form-control','placeholder'=>'Others'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('due','Previous Due (If any)')}}
                {{form::text('due',$payment->due,['class'=>'form-control','placeholder'=>'Previous Due'])}}
            </div>
        </div>
            <hr>
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection
