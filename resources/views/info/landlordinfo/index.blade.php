@extends('layouts.apanel')
@section('content')
<div class="container">
  <h2>Landlord</h2>    

  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>Info ID</th>
              <th>Previous Landlord Name</th>
              <th>Previous Landlord Contact</th>
              <th>Previous House Address</th>
              <th>Reason To Leave</th>
              <th>Present Landloard Name</th>
              <th>Present Landloard Contact</th>
              <th>Tenant Since</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
    @if(count($landlordinfos)>0)
    @foreach($landlordinfos as $landlordinfo)
          <tbody>
            <tr>
              <td>{{ $landlordinfo->personalinfo_id }}</td>
              <td>{{ $landlordinfo->prev_landlord_name }}</td>
              <td>{{ $landlordinfo->prev_landlord_contact  }}</td>
              <td>{{ $landlordinfo->prev_landloard_address }}</td>
              <td>{{ $landlordinfo->reason_to_leave }}</td>
              <td>{{ $landlordinfo->pres_landlord_name }}</td>
              <td>{{ $landlordinfo->pres_landlord_contact }}</td>
              <td>{{ $landlordinfo->tenent_since }}</td>
              
              <td><a href="{{url('/landlordinfo/'.$landlordinfo->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
              <td>
                  {!! Form::open(['action'=> ['LandlordinfoController@destroy', $landlordinfo->id], 'method'=> 'POST']) !!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                  {!! Form::close() !!}
              </td>
              
            </tr>
          </tbody>
    @endforeach
        </table>
        <hr>
        {{$landlordinfos->links()}}
        <hr>
      </div>
</div>   
@endif

@endsection


