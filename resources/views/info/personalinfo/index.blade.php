@extends('layouts.apanel')
@section('content')
<div class="container">
  <h2>User Profile</h2>    
  <div class="table-responsive">    
      <table class="table table-sm table-light table-hover">
        <thead>
          <tr>
            <th>User ID</th>
            <th>Info ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Floor<th> 
            <th></th>
            <th></th>
          </tr>
        </thead>
        @if(count($personalinfos)>0)
        @foreach ($personalinfos as $personalinfo)
        <tbody>
          <tr>
              <td>{{$personalinfo->user_id}}</td>
              <td>{{$personalinfo->id}}</td>
              
              <td><a href="{{url('/personalinfo/'.$personalinfo->id)}}">{{$personalinfo->person_name}}</a><br>
                  <small>added on {{$personalinfo->created_at}}</small></td>

              <td>{{$personalinfo->contact}}</td>
              <td>{{$personalinfo->floor}}</td>
              @if(Auth::user()->role_id=='1')
              <td><a href="{{url('/personalinfo/'.$personalinfo->id.'/edit')}}" class="btn btn-outline-info float-right btn-sm">Edit</a></td>
              
              <td>{!! Form::open(['action'=> ['PersonalinfoController@destroy', $personalinfo->id], 'method'=> 'POST']) !!}
              {{Form::hidden('_method','DELETE')}}
              {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
              {!! Form::close() !!}</td>
              @endif
          </tr>
        </tbody>
        @endforeach
      </table>
        <hr>
        {{$personalinfos->links()}}
        <hr>
        @if(Auth::user()->role_id=='1')
        <a href="{{url('/personalinfo/create')}}" class="btn btn-outline-primary btn-sm">Add Info</a>
        <!-- <a href="{{url('/familymember/create')}}" class="btn btn-primary btn-sm">Next</a> -->
        @endif
      </div>
    </div>
  @else 
          <p>No Information Available</p>   
  @endif
</div>

@endsection


