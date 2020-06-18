@extends('layouts.apanel')
@section('content')
<div class="container">
  <h2>Home Maid</h2>    

  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>Info ID</th>
              <th>Name</th>
              <th>NID</th>
              <th>Contact</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          @if(count($maidinfos)>0)
          @foreach($maidinfos as $maidinfo)
          <tbody>
            <tr>
                <td>{{ $maidinfo->personalinfo_id }}</td>
                <td>{{ $maidinfo->maid_name }}</td>
                <td>{{ $maidinfo->maid_nid }}</td>
                <td>{{ $maidinfo->maid_contact }}</td>
                <td>{{ $maidinfo->maid_address }}</td>
                
                <td><a href="{{url('/maidinfo/'.$maidinfo->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['MaidinfoController@destroy', $maidinfo->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
              
            </tr>
          </tbody>
          @endforeach
        </table>
        <hr>
        {{$maidinfos->links()}}
        <hr>
        
        <a href="{{url('/maidinfo/create')}}" class="btn btn-outline-primary btn-sm">Add Maid</a>
        <a href="{{url('/driverinfo/create')}}" class="btn btn-outline-info btn-sm">Next</a>
      </div>
</div>   
          @endif

@endsection


