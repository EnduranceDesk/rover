<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>GENERAL</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ url("/") }}"><i class="fa fa-home"></i> Home </span></a>
      </li>
    </ul>
     <h3>ROVER</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ route("rover.builder") }}"><i class="fa fa-rocket"></i> ROVER BUILDER</span></a>
      </li>
    </ul>
    <h3>SERVER</h3>
    <ul class="nav side-menu">
      <li>
        <a href="{{ route("server.config.ip") }}"><i class="fa fa-home"></i> IP Config</span></a>
      </li>
    </ul>
  </div>
</div>