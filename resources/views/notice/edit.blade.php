@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Update Notice</h1>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['NoticeController@update',$notice->id ],'method'=>'POST']) !!}

            <div class='form-group'>
                {{form::label('title','Title')}}
                {{form::text('title',$notice->title,['class'=>'form-control','placeholder'=>'Title'])}}
            </div>

            <div class='form-group'>
                {{form::label('body','Notice')}}
                {{form::textarea('body',$notice->body,['id'=>'text-body', 'class'=>'form-control','placeholder'=>'Type your notice here'])}}
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
