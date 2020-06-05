<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>
      <div class="nav" style="display: inline-grid;">
        <div class="input-group">
          <form style="display: contents;" action="">
            <input type="text" class="form-control input-sm" name="query" placeholder="Search Orders...">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Go!</button>
            </span>
          </form>
        </div>
        
      </div>
      <ul class="nav navbar-nav navbar-right" style="max-width: 30%;">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="/images/img.jpg" alt=""><span>{{ ucwords(Auth::user()->name)}}</span>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="">Change Password</a></li>
            <li><a href="mailto:adnanhussainturki@gmail.com">Help</a></li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out pull-right"></i> Log Out</a>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>