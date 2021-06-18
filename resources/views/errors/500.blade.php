@extends('layouts.main')

@section('title', '500 Page')

@section('content')

<div class="container ptb-100" style="text-align: center">
    <div class="blog-details-info">
        <img src="{{ asset('assets/img/bg/500.png') }}" style="width:20%; height:20%" alt="500 error">
        <h3>Internal Server Error</h3>
        <p class="pl-50 pr-50">Sorry, there were some technical issues while processing your request. </strong>.</p>
    </div>
</div>

@endsection
