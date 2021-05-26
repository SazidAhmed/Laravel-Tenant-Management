@extends('layouts.app', ['activePage' => 'roles', 'titlePage' => __('Roles')])
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
      <div class="col-sm-12 col-md-8 col-lg-8 ">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-4 text-left">
              <h4 class="card-title ">User-Role</h4>
              <p class="card-category">Manage Here</p>
              </div>
              <div class="col-4 text-center">
              </div>
              <div class="col-4 text-right">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-sm btn-round btn-success" data-toggle="modal" data-target="#addrolemodal"> <i class="material-icons text-white">addchart</i>Create</button>
              </div>
            </div>
          </div>
          <div class="card-body">
          <br>
              <!-- table -->
            <div class="table-responsive">
              <table id="roles" class="table table-sm table-hover">
              @if(count($roles)>0)
                <thead class=" text-primary">
                  
                  <th>SN</th>
                  <th>Name</th>
                  <th>Description</th>
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
                    <td>{{$role->description}}</td>
                    <td class="text-primary">
                      <!--View Button -->
                      <a href="#" data-toggle="modal" data-target="#viewrolemodal{{$role->id}}">
                        <i class="material-icons text-info">visibility</i>
                        </a>
                        <!-- View modal -->
                        <div class="modal fade" id="viewrolemodal{{$role->id}}" tabindex="-1" role="dialog" >
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="card">
                                <div class="card-header card-header-primary">
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h4 class="card-title">Role</h4>
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
                                              <td class="text-info">Role ID</td>
                                              <td>{{$role->id}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-info">Name</td>
                                              <td>{{$role->name}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-info">Description</td>
                                              <td>{{$role->description}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-info">Created Date</td>
                                              <td>{{$role->created_at}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-info">Updated_at</td>
                                              <td>{{$role->updated_at}}</td>
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
                      <!--Edit Button -->
                      <a href="#" data-toggle="modal" data-target="#editrolemodal{{$role->id}}">
                      <i class="material-icons text-success">edit</i>
                      </a>
                      <!-- Edit modal -->
                      <div class="modal fade" id="editrolemodal{{$role->id}}" tabindex="-1" role="dialog" >
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="card">
                              <div class="card-header card-header-primary">
                                <div class="row">
                                  <div class="col-6 text-left">
                                  <h4 class="card-title ">Role</h4>
                                  <p class="card-category">Update Here</p>
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
                                  <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                                      </div>
                                      <input type="text" name="name" value="{{$role->name}}" class="form-control" placeholder="Name" required="">
                                    </div>
                                  </div>
                                  <div class="form-group bmd-form-group">
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                                      </div>
                                      <input type="text"  name="description" value="{{$role->description}}"  class="form-control" placeholder="Description" required="">
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
                      <a href="#" data-toggle="modal" data-target="#deleterolemodal{{$role->id}}">
                      <i class="material-icons text-rose">delete</i>
                      </a>
                      <!-- Delete modal -->
                      <div class="modal fade" id="deleterolemodal{{$role->id}}" tabindex="-1" role="dialog" >
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
      <div class="col-sm-12 col-md-4 col-lg-4 ">
        <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-4 text-left">
                <h4 class="card-title ">Permissons</h4>
                <p class="card-category">Manage Here</p>
                </div>
                <div class="col-4 text-center">
                  
                </div>
                <div class="col-4 text-right">
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-sm btn-round btn-success" data-toggle="modal" data-target="#addpermissionmodal"> <i class="material-icons text-white">addchart</i>Create</button>
                </div>
              </div>
            </div>
          <div class="card-body">
          <br>
              <!-- table -->
            <div class="table-responsive">
              <table id="permissions" class="table table-sm table-hover">
              @if(count($permissions)>0)
                <thead class=" text-primary">
                  <th>SN</th>
                  <th>Name</th>
                  <th>Action</th>
                </thead>
                @else
              <h3 class="text-info text-center">Welcome To Role Section</h3>
              <h5 class="text-success text-center">You Can Add Role-Permission By Create Button</h5>
              @endif
                <tbody>
                @foreach($permissions as $key=>$permission)
                  <tr>
                    <td>
                      <h6 style="display: none">{{$permission->id}}</h6>
                      {{$key+1}}
                    </td>
                    <td>{{$permission->role->name}}</td>
                    <td class="text-primary">
                        <!--View Button -->
                        <a href="#" data-toggle="modal" data-target="#viewpermissionmodal{{$permission->id}}">
                        <i class="material-icons text-info">visibility</i>
                        </a>
                        <!-- View modal -->
                        <div class="modal fade" id="viewpermissionmodal{{$permission->id}}" tabindex="-1" role="dialog" >
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="card">
                                <div class="card-header card-header-primary">
                                  <div class="row">
                                    <div class="col-6 text-left">
                                      <h4 class="card-title">Permission</h4>
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
                                              <td>{{$permission->id}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-info">Created On</td>
                                              <td>{{$permission->created_at}}</td>
                                            </tr>
                                            <tr>
                                              <td class="text-info">Last Update</td>
                                              <td>{{$permission->updated_at}}</td>
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
                       <!--Edit Button -->
                        <a href="#" data-toggle="modal" data-target="#editpermissionmodal{{$permission->id}}">
                        <i class="material-icons text-success">edit</i>
                        </a>
                        <!-- Edit modal -->
                        <div class="modal fade" id="editpermissionmodal{{$permission->id}}" tabindex="-1" role="dialog" >
                          <div class="modal-dialog modal-signup" role="document">
                            <div class="modal-content">
                              <div class="card">
                                <div class="card-header card-header-primary">
                                  <div class="row">
                                    <div class="col-6 text-left">
                                    <h4 class="card-title ">Permissions For {{$permission->role->name}}</h4>
                                    <p class="card-category">Edit & Update Here</p>
                                    </div>
                                    <div class="col-6 text-right">
                                    <form action="{{route('permissions.update',[$permission->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                                                <td><input type="checkbox" name="name[role][can-add]" @if(isset($permission['name']['role']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[role][can-edit]" @if(isset($permission['name']['role']['can-edit']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[role][can-delete]" @if(isset($permission['name']['role']['can-delete']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[role][can-view]" @if(isset($permission['name']['role']['can-view']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[role][can-list]" @if(isset($permission['name']['role']['can-list']))checked @endif value="1"></td>
                                              </tr>
                                              <tr>
                                                <td>Permissions</td>
                                                <td><input type="checkbox" name="name[permission][can-add]" @if(isset($permission['name']['permission']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[permission][can-edit]" @if(isset($permission['name']['permission']['can-edit']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[permission][can-delete]"@if(isset($permission['name']['permission']['can-delete']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[permission][can-view]" @if(isset($permission['name']['permission']['can-view']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[permission][can-list]"@if(isset($permission['name']['permission']['can-list']))checked @endif value="1"></td>
                                              </tr>
                                              <tr>
                                                <td>User</td>
                                                <td><input type="checkbox" name="name[user][can-add]" @if(isset($permission['name']['user']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[user][can-edit]" @if(isset($permission['name']['user']['can-edit']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[user][can-delete]" @if(isset($permission['name']['user']['can-delete']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[user][can-view]" @if(isset($permission['name']['user']['can-view']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[user][can-list]" @if(isset($permission['name']['user']['can-list']))checked @endif value="1"></td>
                                              </tr>
                                              <tr>
                                                <td>Notice</td>
                                                <td><input type="checkbox" name="name[notice][can-add]" @if(isset($permission['name']['notice']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[notice][can-edit]" @if(isset($permission['name']['notice']['can-edit']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[notice][can-delete]" @if(isset($permission['name']['notice']['can-delete']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[notice][can-view]" @if(isset($permission['name']['notice']['can-view']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[notice][can-list]" @if(isset($permission['name']['notice']['can-list']))checked @endif value="1"></td>
                                              </tr>
                                              <tr>
                                                <td>Leave Application</td>
                                                <td><input type="checkbox" name="name[leave][can-add]" @if(isset($permission['name']['leave']['can-add']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[leave][can-edit]" @if(isset($permission['name']['leave']['can-edit']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[leave][can-delete]" @if(isset($permission['name']['leave']['can-delete']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[leave][can-view]" @if(isset($permission['name']['leave']['can-view']))checked @endif value="1"></td>
                                                <td><input type="checkbox" name="name[leave][can-list]" @if(isset($permission['name']['leave']['can-list']))checked @endif value="1"></td>
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
                        <a href="#" data-toggle="modal" data-target="#deletepermissionmodal{{$permission->id}}">
                        <i class="material-icons text-rose">delete</i>
                        </a>
                        <!-- Delete modal -->
                        <div class="modal fade" id="deletepermissionmodal{{$permission->id}}" tabindex="-1" role="dialog" >
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
                                      <form action="{{route('permissions.destroy',[$permission->id])}}" method="post">@csrf
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

<!-- Add Role modal -->
<div class="modal fade" id="addrolemodal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Role</h4>
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
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" name="name" class="form-control" placeholder="Name" required="">
              </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" name="description"  class="form-control" placeholder="Description" required="">
              </div>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Add Permission modal -->
<div class="modal fade" id="addpermissionmodal" tabindex="-1" role="dialog" >
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
            <form action="{{route('permissions.store')}}" method="post" enctype="multipart/form-data">@csrf
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
              <div class="col-md-4">
              <!--selectpicker -->
                <div class="form-group">
                  <select name="role_id" class="form-control " data-style="btn btn-link" >
                  <option >Select Role...</option>
                    @foreach(App\Role::all() as $role)
                      <option value="{{$role->id }}">{{$role->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
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
                          <td><input type="checkbox" name="name[role][can-add]" value="1"></td>
                          <td><input type="checkbox" name="name[role][can-edit]" value="1"></td>
                          <td><input type="checkbox" name="name[role][can-delete]" value="1"></td>
                          <td><input type="checkbox" name="name[role][can-view]" value="1"></td>
                          <td><input type="checkbox" name="name[role][can-list]" value="1"></td>
                      </tr>
                      <tr>
                          <td>Permissions</td>
                          <td><input type="checkbox" name="name[permission][can-add]" value="1"></td>
                          <td><input type="checkbox" name="name[permission][can-edit]" value="1"></td>
                          <td><input type="checkbox" name="name[permission][can-delete]" value="1"></td>
                          <td><input type="checkbox" name="name[permission][can-view]" value="1"></td>
                          <td><input type="checkbox" name="name[permission][can-list]" value="1"></td>
                      </tr>
                      <tr>
                          <td>User</td>
                          <td><input type="checkbox" name="name[user][can-add]" value="1"></td>
                          <td><input type="checkbox" name="name[user][can-edit]" value="1"></td>
                          <td><input type="checkbox" name="name[user][can-delete]" value="1"></td>
                          <td><input type="checkbox" name="name[user][can-view]" value="1"></td>
                          <td><input type="checkbox" name="name[user][can-list]" value="1"></td>
                      </tr>
                      <tr>
                        <td>Notice</td>
                        <td><input type="checkbox" name="name[notice][can-add]" value="1"></td>
                        <td><input type="checkbox" name="name[notice][can-edit]" value="1"></td>
                        <td><input type="checkbox" name="name[notice][can-delete]" value="1"></td>
                        <td><input type="checkbox" name="name[notice][can-view]" value="1"></td>
                        <td><input type="checkbox" name="name[notice][can-list]" value="1"></td>
                      </tr>
                      <tr>
                        <td>Application</td>
                        <td><input type="checkbox" name="name[leave][can-add]" value="1"></td>
                        <td><input type="checkbox" name="name[leave][can-edit]" value="1"></td>
                        <td><input type="checkbox" name="name[leave][can-delete]" value="1"></td>
                        <td><input type="checkbox" name="name[leave][can-view]" value="1"></td>
                        <td><input type="checkbox" name="name[leave][can-list]" value="1"></td>
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