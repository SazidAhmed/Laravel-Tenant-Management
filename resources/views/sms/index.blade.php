@extends('layouts.apanel')
@section('content')
<div class="container">
    <h2>Messages</h2>    
  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Contact</th>
              <th>Message</th>
              <th>Date & Time</th>
              <th></th>
            </tr>
          </thead>
          @foreach($smss as $sms)
          <tbody>
            <tr>
                <td>{{ $sms->name }}</td>
                <td>{{ $sms->email }}</td>
                <td>{{ $sms->contact }}</td>
                <td>{{ $sms->message }}</td>
                <td>{{ $sms->created_at }}</td>
                
                <td>
                    {!! Form::open(['action'=> ['SmsController@destroy', $sms->id], 'method'=> 'POST']) !!}
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
      {{$smss->links()}}
</div>   


@endsection


