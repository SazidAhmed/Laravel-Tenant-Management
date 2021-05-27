@extends('layouts.app', ['activePage' => 'family', 'titlePage' => __('User Family')])

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
                <h4 class="card-title ">Family Information</h4>
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
                <table id="datatable" class="table">
                  <thead class=" text-primary">
                    <tr>
                      <th>Index</th>
                      <th>Username</th>
                      <th>Relation</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($familys as $key=>$family)
                    <tr>
                      <td>{{ $key + 1 }}</td>
                      <td>{{$family->user->username??''  }}</td>
                      <td>{{$family->relation}}</td>
                      <td>{{$family->name}}</td>
                      <td>{{$family->contact}}</td>
                      <td>
                        <!--View Button -->
                        <a href="#" data-toggle="modal" data-target="#viewmodal{{$family->id}}">
                        <i class="material-icons text-info">visibility</i>
                        </a>
                        <!--Edit Button -->
                        <a href="#" data-toggle="modal" data-target="#editmodal{{$family->id}}">
                        <i class="material-icons text-success">edit</i>
                        </a>
                        <!--Delete Button -->
                        <a href="#" data-toggle="modal" data-target="#deletemodal{{$family->id}}">
                        <i class="material-icons text-rose">delete</i>
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

@foreach($familys as $key=>$family)

<!-- View modal -->
<div class="modal fade" id="viewmodal{{$family->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
              <h4 class="card-title">Family</h4>
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
                      <td>{{$family->id}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Username</td>
                      <td>{{$family->user->username ??''}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Name</td>
                      <td>{{$family->name}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Relation</td>
                      <td>{{$family->relation}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Contact</td>
                      <td>{{$family->contact}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Occupation</td>
                      <td>{{$family->occupation}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Age</td>
                      <td>{{$family->age}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Created On</td>
                      <td>{{$family->created_at}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Last Update</td>
                      <td>{{$family->updated_at}}</td>
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
<div class="modal fade" id="editmodal{{$family->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Family</h4>
            <p class="card-category">Edit & Update Here</p>
            </div>
            
            <div class="col-6 text-right">
            <form action="{{route('family.update',[$family->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                <select class="form-control" name="user_id" data-style="btn btn-link">
                  @foreach(App\User::all() as $user)
                    <option value="{{$user->id}}" @if($family->user_id==$user->id)selected @endif >{{$user->username}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="name" class="form-control" value="{{$family->name}}" placeholder="Name..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="occupation" class="form-control" value="{{$family->occupation}}" placeholder="Occupation..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="relation" class="form-control" value="{{$family->relation}}" placeholder="Relation..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="age" class="form-control" value="{{$family->age}}" placeholder="Age..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="contact" class="form-control" value="{{$family->contact}}" placeholder="Contact..." required="">
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
<div class="modal fade" id="deletemodal{{$family->id}}" tabindex="-1" role="dialog" >
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
              <form action="{{route('family.destroy',[$family->id])}}" method="post">@csrf
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Family</h4>
            <p class="card-category">Information Create Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('family.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                <select class="form-control" name="user_id" data-style="btn btn-link">
                  @foreach(App\User::all() as $user)
                    <option value="{{$user->id}}">{{$user->username}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="name" class="form-control" placeholder="Name..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="occupation" class="form-control" placeholder="Occupation..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="relation" class="form-control" placeholder="Relation..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="age" class="form-control" placeholder="Age..." required="">
                </div>
            </div>
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