@extends('layouts.apanel')
@section('content')
<div class="container">
    <h1>Add Payment</h1>
    <hr>
    <div class="container">    
        <table class="table table-light">
        {!! Form::open(['action'=> ['UserController@update',$user->id ],'method'=>'POST']) !!}
          
            <div class='form-group'>
                {{form::label('role_id','Role')}} <br>
                
                {{form::select('role_id', array
                (
                '1' => 'Admin', '2' => 'Tenant'),$user->role_id
                )}}
            </div>

            <div class='form-group'>
                {{form::label('name','Name')}}
                {{form::text('name',$user->name,['class'=>'form-control','placeholder'=>'Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('username','User Name')}}
                {{form::text('username',$user->username,['class'=>'form-control','placeholder'=>'User Name'])}}
            </div>

            <div class='form-group'>
                {{form::label('email','Email')}}
                {{form::text('email',$user->email,['class'=>'form-control','placeholder'=>'Email'])}}
            </div>

            <div class='form-group'>
                {{form::label('password','Password')}}
                {{form::text('password',$user->password,['class'=>'form-control','placeholder'=>'Password'])}}
            </div>

            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Update',['class'=>'btn btn-outline-primary'])}}
        {!! Form::close() !!}
        </table>
    </div>
</div>
@endsection
