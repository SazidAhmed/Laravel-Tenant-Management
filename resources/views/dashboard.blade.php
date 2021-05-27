@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="content">
      <div class="container-fluid">
        <!-- top cards -->
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-warning card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">content_copy</i>
                </div>
                <p class="card-category">We Have</p>
                <h3 class="card-title">{{App\User::count()}}
                  <small>Families</small>
                </h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  <a  href="{{ route('user.index') }}">View Here...</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-success card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">store</i>
                </div>
                <p class="card-category">We Have</p>
                <h3 class="card-title">{{App\Family::count()}}
                <small>Members</small></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  <a href="{{ route('family.index') }}">View Here...</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">We Have</p>
                <h3 class="card-title">{{App\Role::count()}}
                <small>UserRoles</small></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  <a href="{{ route('roles.index') }}">View Here...</a>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="fa fa-twitter"></i>
                </div>
                <p class="card-category">We Have</p>
                <h3 class="card-title">{{App\Notice::count()}} <small>Notices</small></h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons text-danger">warning</i>
                  <a href="{{ route('notices.index') }}">View Here...</a>
                </div>
              </div>
            </div>
          </div>
        </div>
         <!-- Payments -->
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-header card-header-danger">
                <h4 class="card-title">Payments</h4>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="table-responsive">
                      <table id="datatable" class="table table-sm table-hover">
                        <thead class=" text-primary">
                          <tr>             
                            <th>Username</th>
                            <th>Month</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($payments=App\Payment::paginate(2) as $payment)
                          <tr>
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
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                      {{ $payments->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
         <!-- User Profile -->
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-success">
                <h3 class="card-title">{{Auth::user()->username}} Profile</h3>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12 col-sm-12 ml-auto">
                    <table class="table table-borderless">
                      <tbody>
                        <tr>
                          <td class="text-info">Full Name</td>
                          <td>{{Auth::user()->userinfo->name ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Father Name</td>
                          <td>{{Auth::user()->userinfo->father ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Mobile</td>
                          <td>{{Auth::user()->mobile}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Email</td>
                          <td>{{Auth::user()->userinfo->email ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Address</td>
                          <td>{{Auth::user()->userinfo->address ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Occupation</td>
                          <td>{{Auth::user()->userinfo->occupation ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Office</td>
                          <td>{{Auth::user()->userinfo->office ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Religion</td>
                          <td>{{Auth::user()->userinfo->religion ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Nid</td>
                          <td>{{Auth::user()->userinfo->nid ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Passport</td>
                          <td>{{Auth::user()->userinfo->passport ??''}}</td>
                        </tr>
                        <tr>
                          <td class="text-info">Tenant From</td>
                          <td>{{Auth::user()->userinfo->date ??''}}</td>
                        </tr>
                      </tbody>
                    </table><br>
                  </div><br>
                  <div class="col-md-12 col-sm-12 mr-auto">
                    <ul>
                    <!-- <img src="storage/profile/{{Auth::user()->userinfo->image ??''}}" width="250" > -->
                    <img src="{{ URL::asset('profile/'.Auth::user()->userinfo->image ??'') }}"  width="250" >
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h3 class="card-title">Notice</h3>
              </div>
              <div class="card-body">
                <table class="table">
                  <tbody>
                    @foreach($notices=App\Notice::paginate(3) as $notice)
                      <h3 class="text-info">{{$notice->title}}</h3>
                      <span class="badge badge-warning">{{$notice->created_at}}</span>
                      <p>{{$notice->description}}</p>
                    @endforeach
                  </tbody>
                  {{ $notices->links() }}
                </table>
              </div>
            </div>
          </div>
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
