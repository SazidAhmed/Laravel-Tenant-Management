@extends('layouts.app', ['activePage' => 'notice', 'titlePage' => __('Notice')])

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
                <h4 class="card-title ">Notice</h4>
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
                      <th>Title</th>
                      <th>Posted By</th>
                      <th>Date & Time</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($notices as $key=>$notice)
                    <tr>
                    <td> {{$key+1}}</td>
                    <td>{{ $notice->title }}</td>
                    <td>{{ $notice->name }}</td>
                    <td>{{ $notice->created_at }}</td>
                      <td>
                        <!--View Button -->
                        <a href="#" data-toggle="modal" data-target="#viewmodal{{$notice->id}}">
                        <i class="material-icons text-info">visibility</i>
                        </a>
                        <!--Edit Button -->
                        <a href="#" data-toggle="modal" data-target="#editmodal{{$notice->id}}">
                        <i class="material-icons text-success">edit</i>
                        </a>
                        <!--Delete Button -->
                        <a href="#" data-toggle="modal" data-target="#deletemodal{{$notice->id}}">
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
@foreach($notices as $key=>$notice)

 <!-- View modal -->
 <div class="modal fade" id="viewmodal{{$notice->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
              <h4 class="card-title">Notice</h4>
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
              <div class="col-md-5">
                <span>Created By : </span> {{$notice->name}}
              </div><br>
              <div class="col-md-7">
                <span>Posted On : </span> {{$notice->date}}
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <h3>Title :</h3><p>{{$notice->title}}</p>
                <h3>Description : </h3> <p>{{$notice->description}}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
              <span>Last Update : </span> {{$notice->updated_at}}
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>

<!-- Edit modal -->
<div class="modal fade" id="editmodal{{$notice->id}}" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Notice</h4>
            <p class="card-category">Edit & Update Here</p>
            </div>
            
            <div class="col-6 text-right">
            <form action="{{route('notice.update',[$notice->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                  <input type="text" name="name" class="form-control" placeholder="Your Name..." required="" value="{{$notice->name}}">
                </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" class="form-control datetimepicker" placeholder="Date..." name="date" class="form-control"  required="" value="{{$notice->date}}" >
              </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="title" class="form-control" placeholder="Title..." required=""  value="{{$notice->title}}">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <textarea class="form-control" name="description" placeholder="Description..." required="" rows="2">{{$notice->description}}</textarea>
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
<div class="modal fade" id="deletemodal{{$notice->id}}" tabindex="-1" role="dialog" >
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
              <form action="{{route('notice.destroy',[$notice->id])}}" method="post">@csrf
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
            <h4 class="card-title ">Notice</h4>
            <p class="card-category">Compose Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('notice.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                  <input type="text" name="name" class="form-control" placeholder="Your Name..." required="" value="{{auth()->user()->username}}">
                </div>
            </div>
            <div class="form-group bmd-form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                </div>
                <input type="text" class="form-control datetimepicker" placeholder="Date..." name="date" class="form-control"  required="">
              </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <input type="text" name="title" class="form-control" placeholder="Title..." required="">
                </div>
            </div>
            <div class="form-group bmd-form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                  </div>
                  <textarea class="form-control" name="description" placeholder="Description..." required="" rows="2"></textarea>
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