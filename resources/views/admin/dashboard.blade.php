<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>TMS</title>

 <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  
  <!-- Styles -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tenant<sup>BD</sup></div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}"> 
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - User Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>User</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/user/create') }}">Add User</a>
            <a class="collapse-item" href="{{ url('/user') }}">User List</a>
          </div>
        </div>
      </li>

      <!-- Nav Item -View User Profile  -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#viewinfo" aria-expanded="true" aria-controls="viewinfo">
          <i class="fas fa-fw fa-user"></i>
          <span>Profile</span>
        </a>
        <div id="viewinfo" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{ url('/personalinfo') }}">Personal Information</a>
            <a class="collapse-item" href="{{ url('/familymember') }}">Family Member</a>
            <a class="collapse-item" href="{{ url('/emergcontact') }}">Emergency Contact</a>
            <a class="collapse-item" href="{{ url('/maidinfo') }}">Home Maid</a>
            <a class="collapse-item" href="{{ url('/driverinfo') }}">Driver</a>
            <a class="collapse-item" href="{{ url('/landlordinfo') }}">Landlord</a>

          </div>
        </div>
      </li>

      <!-- Nav Item -Create Tenant Profile  -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-user"></i>
          <span>Create Profile</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
            <a class="collapse-item" href="{{ url('/personalinfo/create') }}">Personal Information</a>
            <a class="collapse-item" href="{{ url('/familymember/create') }}">Family Member</a>
            <a class="collapse-item" href="{{ url('/emergcontact/create') }}">Emergency Contact</a>
            <a class="collapse-item" href="{{ url('/maidinfo/create') }}">Home Maid</a>
            <a class="collapse-item" href="{{ url('/driverinfo/create') }}">Driver</a>
            <a class="collapse-item" href="{{ url('/landlordinfo/create') }}">Landlord</a>

          </div>
        </div>
      </li>

      <!-- Nav Item - Payment -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fas fa-fw fa-cog"></i>
          <span>Payments</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/payment/create') }}">Add Payment</a>
            <a class="collapse-item" href="{{ url('/payment') }}">Payments List</a>
          </div>
        </div>
      </li>  

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Notice -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Notice</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/notice/create') }}">Add</a>
            <a class="collapse-item" href="{{ url('/notice') }}">View</a>
          </div>
        </div>
      </li>
    <!-- Nav Item - Messages -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMessage" aria-expanded="true" aria-controls="collapseMessage">
          <i class="fas fa-fw fa-table"></i>
          <span>Messages</span>
        </a>
        <div id="collapseMessage" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ url('/tsms') }}">Users Messages</a>
            <a class="collapse-item" href="{{ url('/sms') }}">Local Messages</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Tables -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/sms') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Messages</span></a>
      </li> -->
      <!-- Nav Item - Payments -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/payment') }}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Payments</span></a>
      </li>

      <!-- Nav Item - Info -->
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/personalinfo') }}">
          <i class="fas fa-fw fa-table"></i>
          <span>Tenants</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar ------------------------------------------------------------------------------->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> {{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="https://visualpharm.com/assets/451/Admin-595b40b65ba036ed117d286d.svg">
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <!--logout-->
              <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          @csrf
                  </form>
              </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar--------->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 mb-6">
              <!-- Body Text -->
              <div class="card shadow mb-6">
                <div class="card-body">
                <h4 class="text-primary">Welcome To Dashboard</h4><br>
                <p>You can view necessary infomation from the left blue box.</p>
                <p class="text-success">If you have anything to say, feel free to send a message.</p>
                <p class="text-info">Include your <strong>User ID, a title and a short description</strong> with the message.</p>
                <h6>Thank You</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Yield Content -->
        @yield('content')
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sazid Ahmed 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
 
      </div>
    </div>
  </div>
</div>

</body>
<!-- script -->
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  <!-- Page level plugins -->
  <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  <!-- Page level custom scripts -->
  <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
</html>


