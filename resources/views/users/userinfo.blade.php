@extends('layouts.app', ['activePage' => 'info', 'titlePage' => __('User Info')])

@section('content')

<div class="content">
  <div class="container-fluid">
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{Session::get('message')}}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    @endif
    @if ($errors->any())
      @foreach ($errors->all() as $error) 
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $error }}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
      </div>
      @endforeach
    @endif
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-4 text-left">
              <h4 class="card-title ">Personal Information</h4>
              <p class="card-category">Manage Here</p>
              </div>
              <div class="col-4 text-center">
               
              </div>
              <div class="col-4 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-round btn-success" data-toggle="modal" data-target="#addmodal"> <i class="material-icons text-white">addchart</i>Create</button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="datatable" class="table ">
                <thead class=" text-primary">
                  <th>Index</th>
                  <th>Image</th>
                  <th>UserName</th>
                  <th>Name</th>
                  <th>NID</th>
                  <th>Occupation</th>
                  <th>Office</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach($infos as  $key=> $info)
                  <tr>
                    <td> {{$key+1}}</td>
                    <td><img src="{{asset('profile')}}/{{$info->image}}" width="70" height="80"></td>
                    <td>{{$info->user->username??''  }}</td>
                    <td>{{$info->name}}</td>
                    <td>{{$info->nid}}</td>
                    <td>{{$info->occupation}}</td>
                    <td>{{$info->office}}</td>
                    <td>
                      <!--View Button -->
                      <a href="#" data-toggle="modal" data-target="#viewmodal{{$info->id}}">
                      <i class="material-icons text-info">visibility</i>
                      </a>
                      <!--Edit Button -->
                      <a href="#" data-toggle="modal" data-target="#editmodal{{$info->id}}">
                      <i class="material-icons text-success">edit</i>
                      </a>
                      <!--Delete Button -->
                      <a href="#" data-toggle="modal" data-target="#deletemodal{{$info->id}}">
                      <i class="material-icons text-danger">delete</i>
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@foreach($infos as  $key=> $info)
<!-- View modal -->
<div class="modal fade" id="viewmodal{{$info->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
              <h4 class="card-title">User</h4>
              <p class="card-category">Details Here</p>
            </div>
            <div class="col-6 text-right">
              <!--Button -->
              <button type="button" class="btn btn-rose btn-fab btn-fab-mini btn-round" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">close</i></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12 ml-auto">
                <table class="table table-borderless">
                  <tbody>
                    <tr>
                      <td class="text-info">Data ID</td>
                      <td>{{$info->id}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Tenant From</td>
                      <td>{{$info->date}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Username</td>
                      <td>{{$info->user->username??''  }}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Full Name</td>
                      <td>{{$info->name}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Father</td>
                      <td>{{$info->father}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Date Of Birth</td>
                      <td>{{$info->dob}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Marital Status</td>
                      <td>{{$info->married}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Permanent Address</td>
                      <td>{{$info->address}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Occupation</td>
                      <td>{{$info->occupation}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Office Address</td>
                      <td>{{$info->office}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Religion</td>
                      <td>{{$info->religion}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Education</td>
                      <td>{{$info->education}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Contact</td>
                      <td>{{$info->contact}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">email</td>
                      <td>{{$info->email}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Nid</td>
                      <td>{{$info->nid}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Passport</td>
                      <td>{{$info->passport}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Created On</td>
                      <td>{{$info->created_at}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Last Update</td>
                      <td>{{$info->updated_at}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Image</td>
                      <td><img src="storage/profile/{{$info->image}}" width="120"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>

 <!-- Edit modal -->
<div class="modal fade" id="editmodal{{$info->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">User Information</h4>
            <p class="card-category">Update Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('info.update',[$info->id])}}" method="post" enctype="multipart/form-data">@csrf
              {{method_field('PATCH')}}
              <!-- Update Button -->
              <button type="button" class="btn btn-rose btn-fab btn-fab-mini btn-round" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">close</i></button>
              <button type="submit" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="material-icons">send</i></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <select class="form-control" name="user_id" data-style="btn btn-link">
                      @foreach(App\User::all() as $user)
                        <option value="{{$user->id}}" @if($info->user_id==$user->id)selected @endif >{{$user->username}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker" placeholder="Arrival Date..." name="date" value="{{$info->date}}" class="form-control"  required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="contact" value="{{$info->contact}}" class="form-control" placeholder="Contact..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="name" value="{{$info->name}}" class="form-control" placeholder="Full Name..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="father" value="{{$info->father}}" class="form-control" placeholder="Father Name..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="email" value="{{$info->email}}" class="form-control" placeholder="Email..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker" placeholder="Date Of Birth..." name="dob" value="{{$info->dob}}" class="form-control" required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="nid" value="{{$info->nid}}" class="form-control" placeholder="NID..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="passport" value="{{$info->passport}}" class="form-control" placeholder="Passport..." required="">
                  </div>
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="religion" value="{{$info->religion}}"  class="form-control" placeholder="Religion..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="married" value="{{$info->married}}"  class="form-control" placeholder="Marital Status..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="education" value="{{$info->education}}"  class="form-control" placeholder="Education..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="occupation" value="{{$info->occupation}}"  class="form-control" placeholder="Occupation..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="office" value="{{$info->office}}"  class="form-control" placeholder="Office Address..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" class="form-control" placeholder="Upload Image...">
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="address" value="{{$info->address}}"  class="form-control" placeholder="Permanent Address..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-3 col-sm-4">
                <h5 class="title"></h5>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle">
                    <img src="https://material-dashboard-pro-laravel.creative-tim.com/material/img/placeholder.jpg" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                  <div>
                    <span class="btn btn-round btn-rose btn-file btn-link">
                      <span class="fileinput-new ">Upload</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="image" />
                    </span>
                    <a href="#" class="btn btn-danger btn-round fileinput-exists btn-link" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

 <!-- Delete modal -->
<div class="modal fade modal-mini modal-primary" id="deletemodal{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-small">
    <div class="modal-content">
      <div class="modal-header card-header-danger">
        <h5 class="modal-title" id="myModalLabel">Warning !!!</h5>
      </div>
      <div class="modal-body text-center">
        <h3>Confirm To Delete !!!</h3>
      </div>
      <form action="{{route('info.destroy',[$info->id])}}" method="post">@csrf
      {{method_field('DELETE')}}
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-info btn-link" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger btn-link">Confirm
          <div class="ripple-container"></div>
        </button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach

<!-- Add modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">User Information</h4>
            <p class="card-category">Create Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('info.store')}}" method="post" enctype="multipart/form-data">@csrf
             <!-- Create Button -->
             <button type="button" class="btn btn-rose btn-fab btn-fab-mini btn-round" data-dismiss="modal" aria-hidden="true">
              <i class="material-icons">close</i></button>
              <button type="submit" class="btn btn-success btn-fab btn-fab-mini btn-round"><i class="material-icons">send</i></button>
            </div>
          </div>
        </div>
        <div class="modal-body">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <select class="form-control" name="user_id" data-style="btn btn-link">
                      @foreach(App\User::all() as $user)
                        <option value="{{$user->id}}">{{$user->username}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker" placeholder="Arrival Date..." name="date" class="form-control"  required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="contact" class="form-control" placeholder="Contact..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="name" class="form-control" placeholder="Full Name..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="father" class="form-control" placeholder="Father Name..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="email" class="form-control" placeholder="Email..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" class="form-control datetimepicker" placeholder="Date Of Birth..." name="dob" class="form-control"  required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="nid" class="form-control" placeholder="NID..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="passport" class="form-control" placeholder="Passport..." required="">
                  </div>
                </div>
              </div>
            </div>   
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="religion" class="form-control" placeholder="Religion..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="married" class="form-control" placeholder="Marital Status..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="education" class="form-control" placeholder="Education..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="occupation" class="form-control" placeholder="Occupation..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="office" class="form-control" placeholder="Office Address..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" class="form-control" placeholder="Upload Image...">
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="address" class="form-control" placeholder="Permanent Address..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row justify-content-center">
              <div class="col-md-3 col-sm-4">
                <h5 class="title"></h5>
                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                  <div class="fileinput-new thumbnail img-circle">
                    <img src="https://material-dashboard-pro-laravel.creative-tim.com/material/img/placeholder.jpg" alt="...">
                  </div>
                  <div class="fileinput-preview fileinput-exists thumbnail img-circle"></div>
                  <div>
                    <span class="btn btn-round btn-rose btn-file btn-link">
                      <span class="fileinput-new ">Upload</span>
                      <span class="fileinput-exists">Change</span>
                      <input type="file" name="image" />
                    </span>
                    <a href="#" class="btn btn-danger btn-round fileinput-exists btn-link" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- My Scripts -->
  <script type="text/javascript">

  $(document).ready(function() {
    $('#datatable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [10, 25, 50, -1],
          [10, 25, 50, "All"]
        ],
        // paging: false,
        responsive: false,
        ordering:  false,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search records",
        }
      });
  } );
  </script>
@endsection