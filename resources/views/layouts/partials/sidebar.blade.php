<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>GENERAL</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ url("/") }}"><i class="fa fa-home"></i> Home </span></a>
      </li>
    </ul>
    <h3>DOMAINS</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ route("domain.index") }}"><i class="fa fa-envira"></i> Domains </span></a>
      </li>
    </ul>
    <h3>Server Operations</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ route("cron.index") }}"><i class="fa fa-clock-o"></i> Cron </span></a>
      </li>
    </ul>

  </div>
</div>