@if(Session::has('alert-message'))
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
            <div class="alert alert-{{Session::get('alert-class')}} white alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                <strong>{{Session::get('alert-whoops')}}!</strong> {{Session::get('alert-message')}}
            </div>
        </div>
    </div>
@endif

@if(session('success'))
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="alert alert-success" style="color: white;">
        {!!session('success')!!}
        </div>
    </div>
</div>
@endif

@if(session('error'))
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="alert alert-danger" style="color: white;">
        {!!session('error')!!}
        </div>
    </div>
</div>
@endif

@if(session('warning'))
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="alert alert-warning" style="color: white;">
        {!!session('warning')!!}
        </div>
    </div>
</div>
@endif

@if ($errors->any())
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
        <div class="alert alert-danger" style="color: white;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif