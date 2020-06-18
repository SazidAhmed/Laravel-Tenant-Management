@extends('layouts.apanel')
@section('content')
<div class="container">
    <div class="form-row">
        <div class='form-group col-md-4'>
            <h3>Notice</h3>
        </div>
        <div class='form-group col-md-4'>
        </div> 
        <div class='form-group col-md-4'>
        @if(Auth::user()->role_id=='1')
        <a href="{{url('/notice/create')}}" class="btn btn-outline-primary btn-sm">Add Notice</a>
        @endif
        </div> 
    </div>
  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>Title</th>
              <th>Message</th>
              <th>Posted On</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          @foreach($notices as $notice)
          <tbody>
            <tr>
                <td>{{ $notice->title }}</td>
                <td>{!! $notice->body !!}</td> 
                <td>{{ $notice->created_at }}</td>

                @if(Auth::user()->role_id=='1')
                <td><a href="{{url('/notice/'.$notice->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['NoticeController@destroy', $notice->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
          </tbody>
          @endforeach
        </table>
        <hr>
      </div>
      {{$notices->links()}}
</div>   


@endsection


