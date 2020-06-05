@extends('layouts.template')

@section('content')
    <div class="col-12">
        <div class="x_panel">
            <div class="x_title">
              <h2 style="font-size: 120%;">@yield("page_title")</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
              </ul>
              <div class="clearfix"></div>

            </div>
            <div class="x_content">
                @yield("page_content")
            </div>
          </div>
    </div>
@endsection