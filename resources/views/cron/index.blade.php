@extends('layouts.page')

@section('title')
Cron Jobs
@endsection

@section("page_title")
Cron Jobs
@endsection

@section("page_content")
@if($cronAllowed)
<form action="{{ route("cron.turn.off") }}" method="post">
    @csrf
    <label for="">Current Cron Status: <span style="color: green;">On</span></label>
    <input type="submit" class="btn btn-danger btn-xs" value="Turn Off">
</form>
@else
<form action="{{ route("cron.turn.on") }}" method="post">
    @csrf
    <label for="">Current Cron Status: <span style="color: red;">Off</span></label>
    <input type="submit" class="btn btn-success btn-xs" value="Turn On">
</form>
@endif
@endsection