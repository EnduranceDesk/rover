<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/favicon.ico" type="image/ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield("title") | TORKSKY</title>

    @include("layouts.partials.head")
    @yield("head")
    @stack("head")
  </head>
  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        @if(request()->nav == null)

            <div class="col-md-3 left_col">
              <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                  <a href="{{ url("/") }}" class="site_title"><i class="fa fa-shopping-cart" style="border: 0;"></i> <span>CONTROL</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- menu profile quick info -->
                @include("layouts.partials.menuprofile")
                <!-- /menu profile quick info -->
                <br />
                <!-- sidebar menu -->
                @include("layouts.partials.sidebar")
                <!-- /sidebar menu -->
                <!-- /menu footer buttons -->
                @include("layouts.partials.sidebarfooter")
                <!-- /menu footer buttons -->
              </div>
            </div>
            @include("layouts.partials.topnav")
        @elseif(request()->nav === false)
        @endif
        <!-- top navigation -->
        <!-- /top navigation -->
        
        <!-- page content -->
        <div class="right_col" role="main">
            @include("layouts.partials.alert")
            @yield("content")
        </div>
        <!-- /page content -->
        
        <!-- footer content -->
        @stack("footer")

        
        @include("layouts.partials.footer")
        <!-- /footer content -->
      </div>
    </div>
    @include("layouts.partials.scripts")
    @stack("scripts")
  </body>
</html>