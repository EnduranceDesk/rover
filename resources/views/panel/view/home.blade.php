@extends('layouts.page')
@section("title")
Endurance Panel
@endsection


@section("page_title")
Hello {{ ucwords(Auth::user()->name)}}, 
@endsection

@section("page_content")
@endsection