@extends('layouts.main')

@section('title', '503 Error')

@section('content')

<div class="container ptb-100" style="text-align: center">
    <div class="blog-details-info">
        <img src="{{ asset('assets/img/bg/settings.png') }}" style="width:20%; height:20%" alt="503 error">
        <h3>503 | Service Unavailable</h3>
        <p class="pl-50 pr-50">This server is temporarily busy. Please try again later!</p>
    </div>
</div>

@endsection
