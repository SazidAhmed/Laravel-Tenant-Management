@extends('layouts.apanel')
@section('content')
<div class="container">
  <h2>Driver</h2>    

  <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>info ID</th>
              <th>Name</th>
              <th>NID</th>
              <th>License</th>
              <th>Contact</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
    @if(count($driverinfos)>0)
    @foreach($driverinfos as $driverinfo)
          <tbody>
            <tr>
                <td>{{ $driverinfo->personalinfo_id }}</td>
                <td>{{ $driverinfo->driver_name }}</td>
                <td>{{ $driverinfo->driver_nid }}</td>
                <td>{{ $driverinfo->driver_license }}</td>
                <td>{{ $driverinfo->driver_contact }}</td>
                <td>{{ $driverinfo->driver_address }}</td>
                
                <td><a href="{{url('/driverinfo/'.$driverinfo->id.'/edit')}}" class="btn btn-outline-info btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['DriverinfoController@destroy', $driverinfo->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-danger float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                
            </tr>
          </tbody>
    @endforeach
        </table>
        <hr>
        {{$driverinfos->links()}}
        <hr>
        <a href="{{url('/driverinfo/create')}}" class="btn btn-outline-primary btn-sm">Add Driver</a>
        <a href="{{url('/landlordinfo/create')}}" class="btn btn-outline-info btn-sm">Next</a>
      </div>
</div>

@endif

@endsection


