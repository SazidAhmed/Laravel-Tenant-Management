@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Landlord</h1> 
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['LandlordinfoController@update',$landlordinfo->id ],'method'=>'POST']) !!}

            <div class='form-group'>
                {{form::label('prev_landlord_name','Previous Landlord Name')}}
                {{form::text('prev_landlord_name',$landlordinfo->prev_landlord_name,['class'=>'form-control','placeholder'=>'Previous Landlord Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('prev_landlord_contact','Previous Landlord Contact')}}
                {{form::text('prev_landlord_contact',$landlordinfo->prev_landlord_contact,['class'=>'form-control','placeholder'=>'Previous Landlord Contact'])}}
            </div>

            <div class='form-group'>
                {{form::label('prev_landloard_address','Previous House Address')}}
                {{form::text('prev_landloard_address', $landlordinfo->prev_landloard_address,['class'=>'form-control','placeholder'=>'Previous House Address'])}}
            </div>

            <div class='form-group'>
                {{form::label('reason_to_leave','Reason To Leave')}}
                {{form::text('reason_to_leave',$landlordinfo->reason_to_leave ,['class'=>'form-control','placeholder'=>'Reason To Leave'])}}
            </div>

            <div class='form-group'>
                {{form::label('pres_landlord_name','Present Landlord Name')}}
                {{form::text('pres_landlord_name',$landlordinfo->pres_landlord_name,['class'=>'form-control','placeholder'=>'Present Landlord Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('pres_landlord_contact','Present Landlord Contact')}}
                {{form::text('pres_landlord_contact',$landlordinfo->pres_landlord_contact,['class'=>'form-control','placeholder'=>'Present Landlord Contact'])}}
            </div>

            <div class='form-group'>
                {{form::label('tenent_since','Tenent Since')}}
                {{form::text('tenent_since',$landlordinfo->tenent_since,['class'=>'form-control','placeholder'=>'Tenent Since'])}}
            </div>
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection

