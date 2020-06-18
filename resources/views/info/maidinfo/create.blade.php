@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Home Maid</h1>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action' => 'MaidinfoController@store' , 'method'=>'POST']) !!}

            <div class='form-group'>
                {{form::label('personalinfo_id','Info ID')}}
                {{form::text('personalinfo_id','',['class'=>'form-control','placeholder'=>'Info ID'])}}
            </div>

            <div class='form-group'>
                {{form::label('maid_name','Full Name')}}
                {{form::text('maid_name','',['class'=>'form-control','placeholder'=>'Full Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('maid_nid','NID')}}
                {{form::text('maid_nid','',['class'=>'form-control','placeholder'=>'NID'])}}
            </div>

            <div class='form-group'>
                {{form::label('maid_contact','Contact')}}
                {{form::text('maid_contact','',['class'=>'form-control','placeholder'=>'Contact'])}}
            </div>

            <div class='form-group'>
                {{form::label('maid_address','Age')}}
                {{form::text('maid_address','',['class'=>'form-control','placeholder'=>'Age'])}}
            </div>
            <hr>
            {{Form::submit('Submit',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection
