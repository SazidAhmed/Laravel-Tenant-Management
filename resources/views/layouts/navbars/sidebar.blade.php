    <div class="sidebar" data-color="green" data-background-color="black" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
        <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
         -->
      <div class="logo"><a href="{{ route('dashboard') }}" class="simple-text logo-mini">
          
        </a>
        <a href="{{ route('dashboard') }}" class="simple-text logo-normal">
         TMS BD 
        </a></div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
            <!-- <img src="{{ asset('material') }}/img/faces/avatar.jpg" /> -->
            <img src="{{ URL::asset('profile/'.Auth::user()->userinfo->image ??'') }}" />
          
            
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
              {{Auth::user()->userinfo->name ??''}}
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('profile.edit') }}">
                    <span class="sidebar-mini"> <i class="material-icons">admin_panel_settings</i> </span> 
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
          <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          @if(isset(auth()->user()->role['permissions']['user']['can-list']))
          <li class="nav-item{{ $activePage == 'users' ? ' active' : '' }} ">
            <a class="nav-link" href="{{ route('user.index') }}">
              <i class="material-icons">local_library</i>
              <p> Users </p>
            </a>
          </li>
          @endif
          @if(isset(auth()->user()->role['permissions']['role']['can-list']))
          <li class="nav-item{{ $activePage == 'roles' ? ' active' : '' }} ">
            <a class="nav-link" href="{{ route('roles.index') }}">
              <i class="material-icons">accessibility</i>
              <p> Role-Permission </p>
            </a>
          </li>
          @endif
          <li class="nav-item{{ $activePage == 'payments' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('payment.index') }}">
              <i class="material-icons">monetization_on</i>
              <p> Payments </p>
            </a>
          </li>
          <!--Info Management -->
          @if(isset(auth()->user()->role['permissions']['info']['can-list']))
          <li class="nav-item{{ ($activePage == 'info' || $activePage == 'family' || $activePage == 'emergency' || $activePage == 'extra') ? ' active' : '' }} ">
            <a class="nav-link" data-toggle="collapse" href="#userinfo"  aria-expanded="true">
              <i class="material-icons">supervisor_account</i>
              <p> User Information
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="userinfo">
              <ul class="nav">
                <li class="nav-item{{ $activePage == 'info' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('info.index') }}">
                    <span class="sidebar-mini"> <i class="material-icons">touch_app</i></span>
                    <span class="sidebar-normal"> Personal </span>
                  </a>
                </li>
                <li class="nav-item{{ $activePage == 'family' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('family.index') }}">
                    <span class="sidebar-mini"> <i class="material-icons">touch_app</i></span>
                    <span class="sidebar-normal"> Family </span>
                  </a>
                </li>
                <li class="nav-item{{ $activePage == 'emergency' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('emergency.index') }}">
                    <span class="sidebar-mini"> <i class="material-icons">touch_app</i> </span>
                    <span class="sidebar-normal"> Emergency</span>
                  </a>
                </li>
                <li class="nav-item{{ $activePage == 'extra' ? ' active' : '' }} ">
                  <a class="nav-link" href="{{ route('extra.index') }}">
                    <span class="sidebar-mini"> <i class="material-icons">touch_app</i></span>
                    <span class="sidebar-normal"> Others</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          @endif
          @if(isset(auth()->user()->role['permissions']['notice']['can-list']))
          <li class="nav-item{{ $activePage == 'notice' ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('notice.create') }}">
              <i class="material-icons">date_range</i>
              <p> Notice</p>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>