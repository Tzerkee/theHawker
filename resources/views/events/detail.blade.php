@extends('layouts.main')

@section('title', __('home.eventdetail'))

@section('content')

<!-- event-detail-area start -->
<div class="blog-details pt-95 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="blog-details-info">
                    <div class="blog-meta">
                        <ul>
                            <li>{{ $eventDetail->location }}</li>
                            <li>{{ date('M d, Y', strtotime($eventDetail->event_date)) }}</li>
                        </ul>
                    </div>
                    <h3>{{ $eventDetail->title }}</h3>
                    <img src="{{ Voyager::image( $eventDetail->image ) }}" alt="image">
                    <p>{!! $eventDetail->description !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- event-detail-area end -->

@endsection
