@extends('layouts.apanel')
@section('content')
<div class="container">
    <h3>Compose Message</h3>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action' => 'TsmsController@store' , 'method'=>'POST']) !!}
        <div class="form-row">

            <div class='form-group col-md-4'>
                {{form::label('title','Topic')}}
                {{form::text('title','',['class'=>'form-control','placeholder'=>'Topic'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('user_id','User ID')}}
                {{form::text('user_id','',['class'=>'form-control','placeholder'=>'User ID'])}}
            </div>

            <div class='form-group col-md-4'>
                {{form::label('status','From')}} <br>
                {{form::select('status', array
                (
                    'User' => 'User', 'Admin' => 'Admin' )
                )}}
            </div>
        </div>

            <div class='form-group'>
                {{form::label('body','Message')}}
                {{form::textarea('body','',['id'=>'text-body', 'class'=>'form-control', 'placeholder'=>'Type Your Message Here'])}}
                
            </div>

            {{Form::submit('Send',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'text-body' );
        </script>
        </table>
    </div>
</div>

@endsection
