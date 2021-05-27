@extends('layouts.app', ['activePage' => 'extra', 'titlePage' => __('Extra Info')])

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
                <h4 class="card-title ">Other Information</h4>
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
                      <th>Type</th>
                      <th>Name</th>
                      <th>Contact</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($extras as $key=>$extra)
                      <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{$extra->user->username??''  }}</td>
                        <td>{{$extra->type}}</td>
                        <td>{{$extra->name}}</td>
                        <td>{{$extra->contact}}</td>
                        <td>
                          <!--View Button -->
                          <a href="#" data-toggle="modal" data-target="#viewmodal{{$extra->id}}">
                          <i class="material-icons text-info">visibility</i>
                          </a>
                          <!--Edit Button -->
                          <a href="#" data-toggle="modal" data-target="#editmodal{{$extra->id}}">
                          <i class="material-icons text-success">edit</i>
                          </a>
                          <!--Delete Button -->
                          <a href="#" data-toggle="modal" data-target="#deletemodal{{$extra->id}}">
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

@foreach($extras as $key=>$extra)

<!-- View modal -->
<div class="modal fade" id="viewmodal{{$extra->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
              <h4 class="card-title">Other Information</h4>
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
                      <td>{{$extra->id}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Username</td>
                      <td>{{$extra->user->username ??''}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">type</td>
                      <td>{{$extra->type}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Name</td>
                      <td>{{$extra->name}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Contact</td>
                      <td>{{$extra->contact}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Address</td>
                      <td>{{$extra->address}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Nid</td>
                      <td>{{$extra->nid}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Remarks</td>
                      <td>{{$extra->remarks}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Created On</td>
                      <td>{{$extra->created_at}}</td>
                    </tr>
                    <tr>
                      <td class="text-info">Last Update</td>
                      <td>{{$extra->updated_at}}</td>
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
<div class="modal fade" id="editmodal{{$extra->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Other Information</h4>
            <p class="card-category">Edit & Update Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('extra.update',[$extra->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                    <option value="{{$user->id}}" @if($extra->user_id==$user->id)selected @endif >{{$user->username}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <select class="form-control" name="type" data-style="btn btn-link" >
                  <option value="prev-landlord"  @if($extra->type=="prev-landlord")selected @endif >Prev-Landlord</option>
                  <option value="tutor" @if($extra->type=="tutor")selected @endif >Tutor</option>
                  <option value="homemaid" @if($extra->type=="homemaid")selected @endif >Home-Maid</option>
                  <option value="driver" @if($extra->type=="driver")selected @endif >Driver</option>
                </select>
              </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" name="name" value="{{$extra->name}}" class="form-control" placeholder="Name..." required="">
              </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" name="contact" class="form-control" placeholder="Contact..." required="" value="{{$extra->contact}}" >
              </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" name="address"  class="form-control" placeholder="Address..." required="" value="{{$extra->address}}" >
              </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="nid" class="form-control" placeholder="Nid..." required="" value="{{$extra->nid}}" >
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="remarks" class="form-control" placeholder="Remarks..." required="" value="{{$extra->remarks}}">
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
<div class="modal fade" id="deletemodal{{$extra->id}}" tabindex="-1" role="dialog" >
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
              <form action="{{route('extra.destroy',[$extra->id])}}" method="post">@csrf
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
            <h4 class="card-title ">Other Information</h4>
            <p class="card-category">Create Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('extra.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                <select class="form-control" name="type" data-style="btn btn-link">
                  <option value="prev-landlord">Prev-Landlord</option>
                  <option value="tutor">Tutor</option>
                  <option value="homemaid">Home-Maid</option>
                  <option value="driver">Driver</option>
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
                <input type="text" name="contact" class="form-control" placeholder="Contact..." required="">
              </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" name="address" class="form-control" placeholder="Address..." required="">
              </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="nid" class="form-control" placeholder="Nid..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="remarks" class="form-control" placeholder="Remarks..." required="">
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