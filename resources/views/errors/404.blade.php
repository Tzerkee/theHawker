@extends('layouts.main')

@section('title', __('home.404'))

@section('content')

<div class="container ptb-100" style="text-align: center">
    <div class="blog-details-info">
        <img class="pb-20" src="{{ asset('assets/img/icons/404.svg') }}" style="width:50%; height:50%" alt="404">
        <h3>{{__('home.pagenotfound')}}</h3>
        <p class="pl-50 pr-50">{{__('home.sorrypagenotfound')}} <br> {{__('home.makesure')}} <strong><a href="{{route('web.home')}}" title="{{__('home.homepage')}}">{{__('home.homepage')}}</a></strong>.</p>
    </div>
</div>

@endsection
