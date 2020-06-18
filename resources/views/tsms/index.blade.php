@extends('layouts.apanel')
@section('content')
<div class="container">
    <div class="form-row">
        <div class='form-group col-md-4'>
            <h3>Messages</h3>
        </div>
        <div class='form-group col-md-4'>
        </div> 
        <div class='form-group col-md-4'>
        <a href="{{url('/tsms/create')}}" class="btn btn-outline-primary btn-sm">Compose</a>
        </div> 
    </div>
  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>User</th>
              <th>From</th>
              <th>Topic</th>
              <th>Message</th>
              <th>Date & Time</th>
              @if(Auth::user()->role_id=='1')
              <th>Updated_at</th>
              @endif
              <th></th>
              <th></th>
            </tr>
          </thead>
          @foreach($tsmss as $tsms)
          <tbody>
            <tr>
                <td>{{ $tsms->user_id }}</td>
                <td>{{ $tsms->status }}</td> 
                <td>{{ $tsms->title }}</td>
                <!-- parsing HTML -->
                <td>{!!$tsms->body!!}</td> 
                <td>{{ $tsms->created_at }}</td>
                @if(Auth::user()->role_id=='1')
                <td>{{ $tsms->updated_at }}</td>
                @endif

                
                <td><a href="{{url('/tsms/'.$tsms->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                @if(Auth::user()->role_id=='1')
                <td>
                    {!! Form::open(['action'=> ['TsmsController@destroy', $tsms->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
      <hr>
      {{$tsmss->links()}}
      <hr>
</div>   


@endsection


