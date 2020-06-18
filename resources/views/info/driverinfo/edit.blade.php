@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Driver</h1> 
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['DriverinfoController@update',$driverinfo->id ],'method'=>'POST']) !!}
            
        <div class='form-group'>
            {{form::label('driver_name','Full Name')}}
            {{form::text('driver_name',$driverinfo->driver_name,['class'=>'form-control','placeholder'=>'Full Name'])}}
        </div>

        <div class='form-group'>
            {{form::label('driver_nid','NID')}}
            {{form::text('driver_nid',$driverinfo->driver_nid,['class'=>'form-control','placeholder'=>'NID'])}}
        </div>

        <div class='form-group'>
            {{form::label('driver_license','License')}}
            {{form::text('driver_license',$driverinfo->driver_license,['class'=>'form-control','placeholder'=>'License'])}}
        </div>

        <div class='form-group'>
            {{form::label('driver_contact','Contact')}}
            {{form::text('driver_contact',$driverinfo->driver_contact,['class'=>'form-control','placeholder'=>'Contact'])}}
        </div>

        <div class='form-group'>
            {{form::label('driver_address','Address')}}
            {{form::text('driver_address',$driverinfo->driver_address,['class'=>'form-control','placeholder'=>'Address'])}}
        </div>   
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection

