<div class="col-md-4 col-sm-4 ">
    <div class="x_panel tile fixed_height_320">
        <div class="x_title">
            <h2>{{$domain->name}}</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <dl class="row">
                <div class="col-md-3 col-sm-3 col-lg-3">
                    <dt>Type</dt>
                    <dd>{{ $domain->type}}</dd>
                </div>
                <div class="col-md-9 col-sm-9 col-lg-9">
                    <dt>Sub Domains</dt>
                    <dd>
                        @if($domain->mail)
                            <span class="badge bg-green bg-lg">MAIL</span>
                        @endif
                        @if($domain->ns1)
                            <span class="badge bg-green bg-lg">NS1</span>
                        @endif
                        @if($domain->ns2)
                            <span class="badge bg-green bg-lg">NS2</span>
                        @endif
                        @if($domain->ftp)
                            <span class="badge bg-green bg-lg">FTP</span>
                        @endif
                        @if($domain->www)
                            <span class="badge bg-green bg-lg">WWW</span>
                        @endif
                        @if($domain->mx)
                            <span class="badge bg-green bg-lg">MX</span>
                        @endif
                    </dd>
                </div>
            </dl>
            <dl class="row">
                <dt>Public Directory</dt>
                <dd>{{ $domain->dir}}</dd>
            </dl>
            @if($domain->ssl)
            <dl class="row" style="color: #1abb9c;">
                <dt><i class="fa fa-lock"></i> SSL Configured</dt>
            </dl>
            @else 
            <dl class="row" style="color: red;">
                <dt><i class="fa fa-lock"></i> SSL not Configured</dt>
            </dl>
            @endif
            <div class="row">
                <a  href="{{ route("domain.ssl.update", ['domain' => $domain->name]) }}" class="btn btn-app">
                    <i class="fa fa-lock"></i> SSL
                </a>
            </div>
        </div>
    </div>
</div>