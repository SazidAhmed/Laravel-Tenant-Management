@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Contact</h1> 
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['EmergcontactController@update',$emergcontact->id ],'method'=>'POST']) !!}

            <div class='form-group'>
                {{form::label('emerg_name','Full Name')}}
                {{form::text('emerg_name',$emergcontact->emerg_name,['class'=>'form-control','placeholder'=>'Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('emerg_relation','Relationship')}}
                {{form::text('emerg_relation',$emergcontact->emerg_relation,['class'=>'form-control','placeholder'=>'Relationship'])}}
            </div>

            <div class='form-group'>
                {{form::label('emerg_address','Address')}}
                {{form::text('emerg_address',$emergcontact->emerg_address,['class'=>'form-control','placeholder'=>'Address'])}}
            </div>

            <div class='form-group'>
                {{form::label('emerg_contact','Contact')}}
                {{form::text('emerg_contact',$emergcontact->emerg_contact,['class'=>'form-control','placeholder'=>'Contact'])}}
            </div>
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection

