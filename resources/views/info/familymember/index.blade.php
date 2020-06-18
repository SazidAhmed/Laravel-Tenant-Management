@extends('layouts.apanel')
@section('content')
<div class="container">
  <h2>Family Members</h2>    

  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>Info ID</th>
              <th>Name</th>
              <th>NID</th>
              <th>Relation</th>
              <th>Contact</th>
              <th>age</th>
              <th>Occupation</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
    @if(count($familymembers)>0)
    @foreach($familymembers as $familymember)
          <tbody>
            <tr>
                <td>{{ $familymember->personalinfo_id }}</td>
                <td>{{ $familymember->family_member_name }}</td>
                <td>{{ $familymember->family_member_nid }}</td>
                <td>{{ $familymember->family_member_relation }}</td>
                <td>{{ $familymember->family_member_contact }}</td>
                <td>{{ $familymember->family_member_age }}</td>
                <td>{{ $familymember->family_member_occupation }}</td>
                
                <td><a href="{{url('/familymember/'.$familymember->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['FamilymemberController@destroy', $familymember->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                
            </tr>
          </tbody>
    @endforeach
        </table>
        <hr>
        {{$familymembers->links()}}
        <hr>
        <a href="{{url('/familymember/create')}}" class="btn btn-outline-primary btn-sm">Add Member</a>
        <a href="{{url('/emergcontact/create')}}" class="btn btn-outline-info btn-sm">Next</a>
      </div>

</div>   
@endif

@endsection


