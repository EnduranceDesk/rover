@extends('layouts.page')

@section('title')
My Domains
@endsection

@section("page_title")
My Domains
@endsection

@section("page_content")
@foreach($domains as $domain)
    @include("domains.partials.card")
@endforeach
@endsection