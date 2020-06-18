@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Emergency Contact</h1>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action' => 'EmergcontactController@store' , 'method'=>'POST']) !!}

            <div class='form-group'>
                {{form::label('personalinfo_id','Info ID')}}
                {{form::text('personalinfo_id','',['class'=>'form-control','placeholder'=>'Info ID'])}}
            </div>
            
            <div class='form-group'>
                {{form::label('emerg_name','Full Name')}}
                {{form::text('emerg_name','',['class'=>'form-control','placeholder'=>'Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('emerg_relation','Relationship')}}
                {{form::text('emerg_relation','',['class'=>'form-control','placeholder'=>'Relationship'])}}
            </div>

            <div class='form-group'>
                {{form::label('emerg_address','Address')}}
                {{form::text('emerg_address','',['class'=>'form-control','placeholder'=>'Address'])}}
            </div>

            <div class='form-group'>
                {{form::label('emerg_contact','Contact')}}
                {{form::text('emerg_contact','',['class'=>'form-control','placeholder'=>'Contact'])}}
            </div>
            <hr>
            {{Form::submit('Submit',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>

@endsection
