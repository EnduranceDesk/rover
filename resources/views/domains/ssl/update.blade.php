@extends('layouts.page')

@section('title')
{{ $domain }} - Update SSL
@endsection

@section("page_title")
{{ $domain }} - Update SSL
@endsection

@section("page_content")
<form action="{{ route("domain.ssl.update.post", ['domain' => $domain]) }}" method="post" >
    @csrf
    <input type="hidden" name="domain" value="{{ $domain}}">
    <label for="">Certificate Authority Bundle: (CABUNDLE)</label>
    <textarea required name="ca_bundle" id="ca_bundle" class="form-control" cols="30" rows="10"></textarea>
    <br>
    <label for="">Private Key (KEY)</label>
    <textarea required name="key" id="key" class="form-control" cols="30" rows="10"></textarea>
    <br>
    <label for="">Certificate: (CRT)</label>
    <textarea required name="crt" id="crt" class="form-control" cols="30" rows="10"></textarea>
    <br>
    <div class="alert alert-danger">
        <b>Important</b>
        <hr style="margin: 2px;">
        This action will update domain whole SSL. Rover won't validate the ceriticate.
    </div>
    <input type="submit" class="btn btn-success btn-block" value="Update SSL">
</form>
@endsection