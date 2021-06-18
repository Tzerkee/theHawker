@extends('layouts.main')

@section('title', 'Forbidden')

@section('content')

<div class="container ptb-100" style="text-align: center">
    <div class="blog-details-info">
        <img src="{{ asset('assets/img/bg/cancel.png') }}" style="width:20%; height:20%" alt="access denied">
        <h3>403 | Access Forbidden</h3>
        <p class="pl-50 pr-50">This action is unauthorized.</p>
    </div>
</div>

@endsection
