@extends('layouts.app', ['activePage' => 'users', 'titlePage' => __('User Profile')])

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
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ $error }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      @endforeach
    @endif
    <div class="row">
      <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <div class="row">
                <div class="col-4 text-left">
                <h4 class="card-title ">Users</h4>
                <p class="card-category">Manage Here</p>
                </div>
                <div class="col-4 text-center">
                 
                </div>
                <div class="col-4 text-right">
                  <!-- Button trigger modal -->
                  @if(isset(auth()->user()->role['permissions']['user']['can-add']))
                  <button type="button" class="btn btn-sm btn-round btn-success" data-toggle="modal" data-target="#addmodal"> <i class="material-icons text-white">addchart</i>Create</button>
                  @endif
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="datatable" class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th>Index</th>
                      <th>
                      Username
                    </th>
                    <th>
                      Mobile
                    </th>
                    <th>Role</th>
                    <th>Date Added</th>
                    @if(isset(auth()->user()->role['permissions']['user']['can-view']))
                    <th>
                      Actions
                    </th>
                    @endif 
                  </tr></thead>
                  <tbody>
                  @foreach($users as $key=>$user)
                    <tr>
                        <td> {{$key+1}}</td>
                        <td>
                          {{$user->username}}
                        </td>
                        <td>
                         {{$user->mobile}}
                        </td>
                        <td>{{$user->role->name??''  }}</td>
                        <td>{{date('d-M-y', strtotime($user->created_at))}}</td>
                        <td>
                          <!--View Button -->
                          @if(isset(auth()->user()->role['permissions']['user']['can-view']))
                          <a href="#" data-toggle="modal" data-target="#viewmodal{{$user->id}}">
                          <i class="material-icons text-info">visibility</i>
                          </a>   
                          @endif             
                          <!--Edit Button -->
                          @if(isset(auth()->user()->role['permissions']['user']['can-edit']))
                          <a href="#" data-toggle="modal" data-target="#editmodal{{$user->id}}">
                            <i class="material-icons text-success">edit</i>
                          </a>
                          @endif
                          <!--Delete Button -->
                          @if(isset(auth()->user()->role['permissions']['user']['can-delete']))
                          <a href="#" data-toggle="modal" data-target="#deletemodal{{$user->id}}">
                          <i class="material-icons text-rose">delete</i>
                          </a>
                          @endif
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
@foreach($users as $user)
  <!-- View modal -->
  <div class="modal fade" id="viewmodal{{$user->id}}" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-login" role="document">
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
                          <td class="text-info">User ID</td>
                          <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Username</td>
                          <td>{{$user->username}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Mobile</td>
                          <td>{{$user->mobile}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Role</td>
                          <td>{{$user->role->name ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Created Date</td>
                          <td>{{$user->created_at}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Updated_at</td>
                          <td>{{$user->updated_at}}</td>
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
  <div class="modal fade" id="editmodal{{$user->id}}" tabindex="-1" role="dialog" >
    <div class="modal-dialog modal-login" role="document">
      <div class="modal-content">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-6 text-left">
              <h4 class="card-title ">User</h4>
              <p class="card-category">Update User</p>
              </div>
              
              <div class="col-6 text-right">
              <form action="{{route('user.update',[$user->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                    <input type="text" name="username" value="{{$user->username}}"  class="form-control" placeholder="Username..." >
                  </div>
              </div>
              <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="mobile" value="{{$user->mobile}}"  class="form-control" placeholder="mobile..." >
                  </div>
              </div>
              <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="password" name="password"  placeholder="Password..." class="form-control" >
                  </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <select class="form-control" name="role_id" data-style="btn btn-link">
                    @foreach(App\Role::all() as $role)
                    <option value="{{$role->id}}"@if($user->role_id==$role->id)selected @endif>{{$role->name}}</option>
                    @endforeach
                  </select>
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
    <div class="modal fade" id="deletemodal{{$user->id}}" tabindex="-1" role="dialog" >
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
                <form action="{{route('user.destroy',[$user->id])}}" method="post">@csrf
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
@endforeach
<!-- Add modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-login" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">User</h4>
            <p class="card-category">Create Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                  <input type="text" name="username" class="form-control" placeholder="Username..." aria-describedby="validationTooltipUsernamePrepend" required required="true">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="mobile" class="form-control" placeholder="mobile..." >
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="password" name="password" placeholder="Password..." class="form-control" >
                </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <select class="form-control" name="role_id" data-style="btn btn-link">
                  @foreach(App\Role::all() as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
                </select>
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