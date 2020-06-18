@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Message</h1>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['TsmsController@update',$tsms->id ],'method'=>'POST']) !!}
        <div class="form-row">

            <div class='form-group col-md-4'>
                {{form::label('title','Topic')}}
                {{form::text('title',$tsms->title,['class'=>'form-control','placeholder'=>'Topic'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('user_id','User ID')}}
                {{form::text('user_id',$tsms->user_id,['class'=>'form-control','placeholder'=>'User ID'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('status','From')}} <br>
                {{form::select('status', array
                (
                    'User' => 'User', 'Admin' => 'Admin' ),$tsms->status
                )}}
            </div>
        </div>

            <div class='form-group'>
                {{form::label('body','Message')}}
                {{form::textarea('body',$tsms->body,['id'=>'text-body', 'class'=>'form-control','placeholder'=>'Type Your Message Here'])}}
            </div>

            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
            <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'text-body' );
            </script>
        </table>
    </div>
</div>
@endsection
