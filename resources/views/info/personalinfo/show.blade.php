@extends('layouts.apanel')
@section('content')
<!--Personal Info-->
<div class="container">
  <hr>
  <h2>Personal Information</h2>
  <hr>
    <div class="table-responsive">    
      <table class="table table-sm table-light table-hover">
      <tbody>
        <!-- <tr>
          <td><b>Info ID</b></td>
          <td>{{$personalinfo->id}}</td>
        </tr>
        <tr>
          <td><b>Floor</b></td>
          <td>{{$personalinfo->floor}}</td>
        </tr> -->
        <tr>
          <td><b>Person Name</b></td>
          <td>{{$personalinfo->person_name}}</td>
        </tr>
        <tr>
          <td><b>NID Number</b></td>
          <td>{{$personalinfo->nid}}</td>
        </tr>
        <tr>
          <td><b>Father Name</b></td>
          <td>{{$personalinfo->father_name}}</td>
        </tr>
        <tr>
          <td><b>Contact Number</b></td>
          <td>{{$personalinfo->contact}}</td>
        </tr>
        <tr>
          <td><b>E-mail</b></td>
          <td>{{$personalinfo->email}}</td>
        </tr>
        <tr>
          <td><b>Permanent Address</b></td>
          <td>{{$personalinfo->permanent_address}}</td>
        </tr>
        <tr>
          <td><b>Educational Qualification</b></td>
          <td>{{$personalinfo->edu_qualification}}</td>
        </tr>
        <tr>
          <td><b>Occupation</b></td>
          <td>{{$personalinfo->occupation}}</td>
        </tr>
        <tr>
          <td><b>Office Address</b></td>
          <td>{{$personalinfo->office_address}}</td>
        </tr>
        <tr>
          <td><b>Religion</b></td>
          <td>{{$personalinfo->religion}}</td>
        </tr>
        <tr>
          <td><b>Marital Status</b></td>
          <td>{{$personalinfo->marital_status}}</td>
        </tr>
        <tr>
          <td><b>Date of Birth</b></td>
          <td>{{$personalinfo->date_of_birth}}</td>
        </tr>
        <tr>
          <td><b>Passport Number(if any)</b></td>
          <td>{{$personalinfo->passport_no}}</td>
        </tr>
      </tbody>
    </table>
    <hr>
    <!--crud-->
    @if(Auth::user()->role_id=='1')
    {!! Form::open(['action'=> ['PersonalinfoController@destroy', $personalinfo->id], 'method'=> 'POST']) !!}
        <a href="{{ url('/personalinfo') }}" class="btn btn-outline-light btn-sm">Go Back</a>
        <a href="{{url('/personalinfo/'.$personalinfo->id.'/edit')}}" class="btn btn-outline-light btn-sm">Edit</a>
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-outline-light btn-sm'])}}
        {!! Form::close() !!}
    @endif
    <!--CRUD end-->
  </div>
</div>
<br>
<!--Family Members-->
<div class="container">
  <hr>
  <h2>Family Members</h2>   
  <hr> 
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>ID</th>
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
          @foreach($familymember as $familymem)
          <tbody>
            <tr>
                <td>{{ $familymem->id }}</td>
                <td>{{ $familymem->family_member_name }}</td>
                <td>{{ $familymem->family_member_nid }}</td>
                <td>{{ $familymem->family_member_relation }}</td>
                <td>{{ $familymem->family_member_contact }}</td>
                <td>{{ $familymem->family_member_age }}</td>
                <td>{{ $familymem->family_member_occupation }}</td>
                @if(Auth::user()->role_id=='1')
                <td><a href="{{url('/familymember/'.$familymem->id.'/edit')}}" class="btn btn-outline-light btn-sm">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['FamilymemberController@destroy', $familymem->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-light float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
          </tbody>
          @endforeach
        </table>
    </div>
</div>
<!--Family Members end-->
</br>
<!--Emergency Contact-->
<div class="container">
  <hr>
  <h2>Emergency Contacts</h2>
  <hr>    
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Relation</th>
              <th>Contact</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          @foreach($emergcontact as $emergcont)
          <tbody>
            <tr>
              <td>{{ $emergcont->id }}</td>
              <td>{{ $emergcont->emerg_name }}</td>
              <td>{{ $emergcont->emerg_relation }}</td>
              <td>{{ $emergcont->emerg_contact }}</td>
              <td>{{ $emergcont->emerg_address }}</td>
              @if(Auth::user()->role_id=='1')
              <td><a href="{{url('/emergcontact/'.$emergcont->id.'/edit')}}" class="btn btn-outline-light btn-sm float-right">Edit</a></td>
              <td>
                  {!! Form::open(['action'=> ['EmergcontactController@destroy', $emergcont->id], 'method'=> 'POST']) !!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete',['class'=>'btn btn-outline-light float-right btn-sm'])}}
                  {!! Form::close() !!}
              </td>
              @endif
            </tr>
          </tbody>
    @endforeach
        </table>
        <hr>
      </div>
</div> 
<!--Emergency Contact end-->
<br>
<!--Maid Info-->
<div class="container">
  <hr>
  <h2>Home Maid</h2>  
  <hr>  
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>NID</th>
              <th>Contact</th>
              <th>Address</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          @foreach($maidinfo as $maid)
          <tbody>
            <tr>
                <td>{{ $maid->id }}</td>
                <td>{{ $maid->maid_name }}</td>
                <td>{{ $maid->maid_nid }}</td>
                <td>{{ $maid->maid_contact }}</td>
                <td>{{ $maid->maid_address }}</td>
                @if(Auth::user()->role_id=='1')
                <td><a href="{{url('/maidinfo/'.$maid->id.'/edit')}}" class="btn btn-outline-light btn-sm float-right">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['MaidinfoController@destroy', $maid->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-light float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
              @endif
            </tr>
          </tbody>
          @endforeach
        </table>
        <hr>
      </div>
</div>  
<!--Maid Info-->
<br>
<!--Driver Info-->
<div class="container">
  <hr>
  <h2>Driver</h2>
  <hr>    
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>NID</th>
              <th>License</th>
              <th>Contact</th>
              <th>Address</th>
              <th></th>
              <th></th>
              
            </tr>
          </thead>
    @foreach($driverinfo as $driver)
          <tbody>
            <tr>
                <td>{{ $driver->id }}</td>
                <td>{{ $driver->driver_name }}</td>
                <td>{{ $driver->driver_nid }}</td>
                <td>{{ $driver->driver_license }}</td>
                <td>{{ $driver->driver_contact }}</td>
                <td>{{ $driver->driver_address }}</td>
                @if(Auth::user()->role_id=='1')
                <td><a href="{{url('/driverinfo/'.$driver->id.'/edit')}}" class="btn btn-outline-light btn-sm float-right">Edit</a></td>
                <td>
                    {!! Form::open(['action'=> ['DriverinfoController@destroy', $driver->id], 'method'=> 'POST']) !!}
                    {{Form::hidden('_method','DELETE')}}
                    {{Form::submit('Delete',['class'=>'btn btn-outline-light float-right btn-sm'])}}
                    {!! Form::close() !!}
                </td>
                @endif
            </tr>
          </tbody>
    @endforeach
        </table>
        <hr>
      </div>
</div>
<!--Driver Info end-->
<br>
<!--Landlord Info-->
<div class="container">
  <hr>
  <h2>Landlord</h2>  
  <hr>  
    <div class="table-responsive">    
        <table class="table table-sm table-light table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Previous Name</th>
              <th>Previous Contact</th>
              <th>Previous Address</th>
              <th>Leaving Reason</th>
              <th>Present Name</th>
              <th>Present Contact</th>
              <th>Arrival Date</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{ $landlordinfo->id }}</td>
              <td>{{ $landlordinfo->prev_landlord_name }}</td>
              <td>{{ $landlordinfo->prev_landlord_contact  }}</td>
              <td>{{ $landlordinfo->prev_landloard_address }}</td>
              <td>{{ $landlordinfo->reason_to_leave }}</td>
              <td>{{ $landlordinfo->pres_landlord_name }}</td>
              <td>{{ $landlordinfo->pres_landlord_contact }}</td>
              <td>{{ $landlordinfo->tenent_since }}</td>
              @if(Auth::user()->role_id=='1')
              <td><a href="{{url('/landlordinfo/'.$landlordinfo->id.'/edit')}}" class="btn btn-outline-light btn-sm float-right">Edit</a></td>
              <td>
                  {!! Form::open(['action'=> ['LandlordinfoController@destroy', $landlordinfo->id], 'method'=> 'POST']) !!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete',['class'=>'btn btn-outline-light float-right btn-sm'])}}
                  {!! Form::close() !!}
              </td>
              @endif
            </tr>
          </tbody>
        </table>
        <hr>
      </div>
</div>  
<!--Landlord Info end-->

<!--Payment-->
<!--Payment End-->
<div class="container">
      <a href="{{url('/admin/dashboard')}}" class="btn btn-outline-primary btn-sm">Dashboard</a>
</div>
@endsection
