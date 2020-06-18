@extends('layouts.apanel')
@section('content')
<div class="container">
<h2>Emergency Contact</h2>    

  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>Info ID</th>
              <th>Name</th>
              <th>Relation</th>
              <th>Contact</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
    @if(count($emergcontacts)>0)
    @foreach($emergcontacts as $emergcontact)
          <tbody>
            <tr>
              <td>{{ $emergcontact->personalinfo_id }}</td>
              <td>{{ $emergcontact->emerg_name }}</td>
              <td>{{ $emergcontact->emerg_relation }}</td>
              <td>{{ $emergcontact->emerg_contact }}</td>
              <td>{{ $emergcontact->emerg_address }}</td>
              
              <td><a href="{{url('/emergcontact/'.$emergcontact->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
              <td>
                  {!! Form::open(['action'=> ['EmergcontactController@destroy', $emergcontact->id], 'method'=> 'POST']) !!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                  {!! Form::close() !!}
              </td>
              
            </tr>
          </tbody>
    @endforeach
        </table>
        <hr>
        {{$emergcontacts->links()}}
        <hr>
        <a href="{{url('/emergcontact/create')}}" class="btn btn-outline-primary btn-sm">Add Contact</a>
        <a href="{{url('/maidinfo/create')}}" class="btn btn-outline-info btn-sm">Next</a>
      </div>

</div>   
@endif

@endsection


