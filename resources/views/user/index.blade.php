@extends('layouts.apanel')
@section('content')
<div class="container">
    <h2>Users</h2>    
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>User Role</th>
              <th>User ID</th>
              <th>Name</th>
              <th>Username</th>
              <th>Email</th>
            </tr>
          </thead>
          @foreach($users as $user)
          <tbody>
            <tr>
                <td>{{ $user->role_id }}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                
                <td><a href="{{url('/user/'.$user->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['UserController@destroy', $user->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
               
            </tr>
          </tbody>
          @endforeach
        </table>
        <hr>
      </div>
      {{$users->links()}}
</div>   


@endsection


