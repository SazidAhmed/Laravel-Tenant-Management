@extends('layouts.app', ['activePage' => 'payments', 'titlePage' => __('Payments')])

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
                <h4 class="card-title ">Payments</h4>
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
                <table id="payment" class="table table-sm table-hover">
                  <thead class=" text-primary">
                    <tr>
                      <th>Index</th>
                      <th>Username</th>
                      <th>Month</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($payments as  $key=> $payment)
                    <tr>
                      <td> {{$key+1}}</td>
                      <td>{{$payment->user->username??''  }}</td>
                      <td>{{$payment->month}}</td>
                      <td>{{$payment->total}}</td>
                      <td>
                        @if($payment->status=="Pending")
                        <span class="badge badge-rose">Pending</span>
                        @else
                        <span class="badge badge-success">Paid</span>
                        @endif
                      </td>
                      <td>
                        <!--View Button -->
                        <a href="#" data-toggle="modal" data-target="#viewmodal{{$payment->id}}">
                        <i class="material-icons text-info">visibility</i>
                        </a>
                        <!--Edit Button -->
                        <a href="#" data-toggle="modal" data-target="#editmodal{{$payment->id}}">
                        <i class="material-icons text-success">edit</i>
                        </a>
                        <!--Delete Button -->
                        <a href="#" data-toggle="modal" data-target="#deletemodal{{$payment->id}}">
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
<!-- Payment view edit delete modal  -->
@foreach($payments as $payment)
  <!-- View modal -->
  <div class="modal fade" id="viewmodal{{$payment->id}}" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-6 text-left">
                <h4 class="card-title">Payment</h4>
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
                        <td class="text-info">Payment ID</td>
                        <td>{{$payment->id}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Username</td>
                        <td>{{$payment->user->username ??''}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Status</td>
                        <td>{{$payment->status}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Month</td>
                        <td>{{$payment->month}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Rent</td>
                        <td>{{$payment->rent}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Water Bill</td>
                        <td>{{$payment->waterbill}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Electric Bill</td>
                        <td>{{$payment->electbill}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Services</td>
                        <td>{{$payment->services}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Others</td>
                        <td>{{$payment->others}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">due</td>
                        <td>{{$payment->due}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Total</td>
                        <td>{{$payment->total}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Created Date</td>
                        <td>{{$payment->created_at}}</td>
                      </tr>
                      <tr>
                        <td class="text-info">Updated_at</td>
                        <td>{{$payment->updated_at}}</td>
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
  <div class="modal fade" id="editmodal{{$payment->id}}" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="card">
          <div class="card-header card-header-primary">
            <div class="row">
              <div class="col-6 text-left">
              <h4 class="card-title ">Payment</h4>
              <p class="card-category">Edit & Update Here</p>
              </div>
              
              <div class="col-6 text-right">
              <form action="{{route('payment.update',[$payment->id])}}" method="post" enctype="multipart/form-data">@csrf
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
                  <select class="form-control" name="status" data-style="btn btn-link">
                    <option value="Pending" @if($payment->status=="Pending")selected @endif >Pending</option>
                    <option value="Paid" @if($payment->status=="Paid")selected @endif >Paid</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <select class="form-control" name="user_id" data-style="btn btn-link">
                        @foreach(App\User::all() as $user)
                          <option value="{{$user->id}}" @if($payment->user_id==$user->id)selected @endif >{{$user->username}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <select class="form-control" name="month" data-style="btn btn-link">
                        <option value="January" @if($payment->month=="January")selected @endif >January</option>
                        <option value="February" @if($payment->month=="February")selected @endif>February</option>
                        <option value="March" @if($payment->month=="March")selected @endif>March</option>
                        <option value="April" @if($payment->month=="April")selected @endif>April</option>
                        <option value="May" @if($payment->month=="May")selected @endif>May</option>
                        <option value="June" @if($payment->month=="June")selected @endif>June</option>
                        <option value="July" @if($payment->month=="July")selected @endif>July</option>
                        <option value="August" @if($payment->month=="August")selected @endif>August</option>
                        <option value="September" @if($payment->month=="September")selected @endif>September</option>
                        <option value="October" @if($payment->month=="October")selected @endif>October</option>
                        <option value="November" @if($payment->month=="November")selected @endif>November</option>
                        <option value="December" @if($payment->month=="December")selected @endif>December</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <input type="text" name="rent" value="{{$payment->rent}}" class="form-control" placeholder="Rent..." required="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <input type="text" name="waterbill" value="{{$payment->waterbill}}" class="form-control" placeholder="Water Bill..." required="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <input type="text" name="electbill" value="{{$payment->electbill}}" class="form-control" placeholder="Electric Bill..." required="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <input type="text" name="services" value="{{$payment->services}}" class="form-control" placeholder="Service Charge..." required="">
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <input type="text" name="others" value="{{$payment->others}}" class="form-control" placeholder="Others (If any)..." required="">
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="form-group bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                      </div>
                      <input type="text" name="due" value="{{$payment->due}}" class="form-control" placeholder="Previous Due (If any)..." required="">
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
  <div class="modal fade" id="deletemodal{{$payment->id}}" tabindex="-1" role="dialog" >
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
                <form action="{{route('payment.destroy',[$payment->id])}}" method="post">@csrf
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

<!-- Payment Add modal -->
<div class="modal fade" id="addmodal" tabindex="-1" role="dialog" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="card">
        <div class="card-header card-header-primary">
          <div class="row">
            <div class="col-6 text-left">
            <h4 class="card-title ">Payment</h4>
            <p class="card-category">Create Here</p>
            </div>
            <div class="col-6 text-right">
            <form action="{{route('payment.store')}}" method="post" enctype="multipart/form-data">@csrf
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
                <select class="form-control" name="status" data-style="btn btn-link">
                  <option value="Pending">Pending</option>
                  <option value="Paid">Paid</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
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
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <select class="form-control" name="month" data-style="btn btn-link">
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="August">August</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="rent" class="form-control" placeholder="Rent..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="waterbill" class="form-control" placeholder="Water Bill..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="electbill" class="form-control" placeholder="Electric Bill..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="services" class="form-control" placeholder="Service Charge..." required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success ">eco</i></div>
                    </div>
                    <input type="text" name="others" class="form-control" placeholder="Others (If any)..." required="">
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="form-group bmd-form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text"><i class="material-icons text-success">eco</i></div>
                    </div>
                    <input type="text" name="due" class="form-control" placeholder="Previous Due (If any)..." required="">
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
    $('#payment').DataTable({
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