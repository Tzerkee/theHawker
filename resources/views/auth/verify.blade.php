@extends('layouts.main')

@section('title', __('home.emailverify'))

@section('content')
<div class="container ptb-100">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s; border-radius: 5px;">
                <div class="card-header">{{ __('home.verify') }}</div>

                <div class="card-body ptb-30 ml-30 mr-30" style="text-align: center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('home.alertresend') }}
                        </div>
                    @endif

                    <div class="blog-details-info">
                        <img src="{{ asset('assets/img/bg/protected.png') }}" style="width:20%; height:20%" alt="" class="pb-20">
                    </div>

                    {{ __('home.beforeproceeding') }} <br>
                    {{ __('home.xreceiveemail') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                            <span style="text-decoration: underline">{{ __('home.requestnewemail') }}</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection