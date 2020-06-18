@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Maid</h1> 
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['MaidinfoController@update',$maidinfo->id ],'method'=>'POST']) !!}
            
        <div class='form-group'>
            {{form::label('maid_name','Full Name')}}
            {{form::text('maid_name',$maidinfo->maid_name,['class'=>'form-control','placeholder'=>'Full Name'])}}
        </div>

        <div class='form-group'>
            {{form::label('maid_nid','NID')}}
            {{form::text('maid_nid',$maidinfo->maid_nid,['class'=>'form-control','placeholder'=>'NID'])}}
        </div>

        <div class='form-group'>
            {{form::label('maid_contact','Contact')}}
            {{form::text('maid_contact',$maidinfo->maid_contact,['class'=>'form-control','placeholder'=>'Contact'])}}
        </div>

        <div class='form-group'>
            {{form::label('maid_address','Age')}}
            {{form::text('maid_address',$maidinfo->maid_address,['class'=>'form-control','placeholder'=>'Age'])}}
        </div>   
        
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection

