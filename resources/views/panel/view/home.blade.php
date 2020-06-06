@extends('layouts.page')
@section("title")
{{ ucwords(Auth::user()->name )}} Rover
@endsection


@section("page_title")
Hello {{ ucwords(Auth::user()->name)}}, 
@endsection

@section("page_content")
@endsection