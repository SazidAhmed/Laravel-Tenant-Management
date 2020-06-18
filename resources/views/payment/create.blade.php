@extends('layouts.apanel')
@section('content')
<div class="container">

    <div class="container">    
        <table class="table table-light">
        <h1>Add Payment</h1>
        <hr>
        {!! Form::open(['action' => 'PaymentController@store' , 'method'=>'POST']) !!}
        <div class="form-row">

            <div class='form-group col-md-4'>
                {{form::label('user_id','User ID')}}
                {{form::text('user_id','',['class'=>'form-control','placeholder'=>'User ID'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('status','Payment Status')}} <br>
                
                {{form::select('status', array
                (
                'Pending' => 'Pending', 'Paid' => 'Paid')
                )}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('month','Select Month')}} <br>
                
                {{form::select('month', array
                ('January' => 'January', 'February' => 'February',
                'March' => 'March', 'April' => 'April',
                'May' => 'May', 'June' => 'June',
                'July' => 'July', 'August' => 'August',
                'September' => 'September', 'October' => 'October',
                'November' => 'November', 'December' => 'December')
                )}}
            </div>
        </div>
        
        <div class="form-row">
            <div class='form-group col-md-4'>
                {{form::label('rent','Rent')}}
                {{form::text('rent','',['class'=>'form-control','placeholder'=>'Rent'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('waterbill','Water Bill')}}
                {{form::text('waterbill','',['class'=>'form-control','placeholder'=>'Water Bill'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('electbill','Electric Bill')}}
                {{form::text('electbill','',['class'=>'form-control','placeholder'=>'Electric Bill'])}}
            </div>
        </div>

        <div class="form-row">
            <div class='form-group col-md-4'>
                {{form::label('services','Service Charge')}}
                {{form::text('services','',['class'=>'form-control','placeholder'=>'Service Charge'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('others','Others (if any)')}}
                {{form::text('others','',['class'=>'form-control','placeholder'=>'Others'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('due','Previous Due (If any)')}}
                {{form::text('due','',['class'=>'form-control','placeholder'=>'Previous Due'])}}
            </div>
        </div>
        <hr>
            {{Form::submit('Submit',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection
