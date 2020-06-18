@extends('layouts.apanel')
@section('content')
<div class="container">
    <h2>Compose Here</h2>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action' => 'NoticeController@store' , 'method'=>'POST']) !!}

            <div class='form-group'>
                {{form::label('title','Title')}}
                {{form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
            </div>

            <div class='form-group'>
                {{form::label('body','Notice')}}
                {{form::textarea('body','',['id'=>'text-body', 'class'=>'form-control','placeholder'=>'Type Your Message Here'])}}
            </div>

            {{Form::submit('Submit',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace( 'text-body' );
            </script>
        </table>
    </div>
</div>
@endsection
