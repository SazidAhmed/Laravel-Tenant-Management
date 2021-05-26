@extends('layouts.app', ['activePage' => 'permissions', 'titlePage' => __('Permissions')])
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
                <h4 class="card-title ">Role Permissons</h4>
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
          <br>
              <!-- table -->
            <div class="table-responsive">
              <table id="permissions" class="table table-sm table-hover">
              @if(count($roles)>0)
                <thead class=" text-primary">
                  <th>SN</th>
                  <th>Name</th>
                  <th>Action</th>
                </thead>
                @else
              <h3 class="text-info text-center">Welcome To Role Section</h3>
              <h5 class="text-success text-center">You Can Add Roles By Create Button</h5>
              @endif
                <tbody>
                @foreach($roles as $key=>$role)
                  <tr>
                    <td>
                      <h6 style="display: none">{{$role->id}}</h6>
                      {{$key+1}}
                    </td>
                    <td>{{$role->name}}</td>
                    <td class="text-primary">
                       <!--Edit Button -->
                        <a href="#" data-toggle="modal" data-target="#editmodal{{$role->id}}">
                        <i class="material-icons text-success">edit</i>
                        </a>
                        <!-- Edit modal -->
                        <div class="modal fade" id="editmodal{{$role->id}}" tabindex="-1" role="dialog" >
                          <div class="modal-dialog modal-signup" role="document">
                            <div class="modal-content">
                              <div class="card">
                                <div class="card-header card-header-primary">
                                  <div class="row">
                                    <div class="col-6 text-left">
                                    <h4 class="card-title ">Permissions For {{$role->name}}</h4>
                                    <p class="card-category">Edit & Update Here</p>
                                    </div>
                                    <div class="col-6 text-right">
                                    <form action="{{route('roles.update',[$role->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                                      <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="form-group bmd-form-group">
                                          <div class="input-group">
                                            <input type="text" name="name" class="form-control" value="{{ $role->name }}" placeholder="Role Name" required="">
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <div class="table-responsive">
                                          <table id="example" class="table table-sm table-hover">
                                            <thead class=" text-primary">
                                              <th>Section</th>
                                              <th>Can-Create</th>
                                              <th>Can-Edit</th>
                                              <th>Can-Delete</th>
                                              <th>Can-View</th>
                                              <th>Can-List</th>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>Role</td>
                                                <td><input type="checkbox" name="permissions[role][can-add]" @if(isset($role['permissions']['role']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[role][can-edit]" @if(isset($role['permissions']['role']['can-edit']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[role][can-delete]" @if(isset($role['permissions']['role']['can-delete']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[role][can-view]" @if(isset($role['permissions']['role']['can-view']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[role][can-list]" @if(isset($role['permissions']['role']['can-list']))checked @endif value="1"></td>
                                              </tr>
                                              <tr>
                                                <td>User</td>
                                                <td><input type="checkbox" name="permissions[user][can-add]" @if(isset($role['permissions']['user']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[user][can-edit]" @if(isset($role['permissions']['user']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[user][can-delete]" @if(isset($role['permissions']['user']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[user][can-view]" @if(isset($role['permissions']['user']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="permissions[user][can-list]" @if(isset($role['permissions']['user']['can-add']))checked @endif value="1"></td>
                                            </tr>
                                            </tbody>
                                          </table>
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

                        <!--Delete Button -->
                        <a href="#" data-toggle="modal" data-target="#deletemodal{{$role->id}}">
                        <i class="material-icons text-rose">delete</i>
                        </a>
                        <!-- Delete modal -->
                        <div class="modal fade" id="deletemodal{{$role->id}}" tabindex="-1" role="dialog" >
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="card">
                                <div class="card-header card-header-primary">
                                <div class="row">
                                    <div class="col-6 text-left">
                                    <h4 class="card-title">Warning !!!</h4>
                                    <p class="card-category">Confirm To Delete</p>
                                    </div>
                                    <div class="col-6 text-right">
                                      <form action="{{route('roles.destroy',[$role->id])}}" method="post">@csrf
                                          {{method_field('DELETE')}}
                                        <!-- Delete Button -->
                                        <button type="button" class="btn btn-rose btn-fab btn-fab-mini btn-round" data-dismiss="modal" aria-hidden="true">
                                        <i class="material-icons">close</i></button>
                                        <button type="submit" class="btn btn-sm btn-success"><i class="material-icons">send</i>Confirm</button>
                                      </form>
                                    </div>
                                  </div>
                                </div>
                              </div>                                 
                            </div>
                          </div>
                        </div>
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


<!-- Add modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-signup" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Permissions</h4>
            <p class="card-category">Create Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">@csrf
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
              
            </div><br>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <input type="text" name="name" class="form-control" placeholder="Role Name" required="">
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="table-responsive">
                  <table id="example" class="table table-sm table-hover">
                    <thead class=" text-primary">
                      <th>Section</th>
                      <th>Can-Create</th>
                      <th>Can-Edit</th>
                      <th>Can-Delete</th>
                      <th>Can-View</th>
                      <th>Can-List</th>
                    </thead>
                    <tbody>
                      <tr>
                          <td>Role</td>
                          <td><input type="checkbox" name="permissions[role][can-add]" value="1"></td>
                          <td><input type="checkbox" name="permissions[role][can-edit]" value="1"></td>
                          <td><input type="checkbox" name="permissions[role][can-delete]" value="1"></td>
                          <td><input type="checkbox" name="permissions[role][can-view]" value="1"></td>
                          <td><input type="checkbox" name="permissions[role][can-list]" value="1"></td>
                      </tr>
                      <tr>
                          <td>User</td>
                          <td><input type="checkbox" name="permissions[user][can-add]" value="1"></td>
                          <td><input type="checkbox" name="permissions[user][can-edit]" value="1"></td>
                          <td><input type="checkbox" name="permissions[user][can-delete]" value="1"></td>
                          <td><input type="checkbox" name="permissions[user][can-view]" value="1"></td>
                          <td><input type="checkbox" name="permissions[user][can-list]" value="1"></td>
                      </tr>
                    </tbody>
                  </table>
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


@endsection