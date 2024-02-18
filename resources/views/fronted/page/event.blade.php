@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Upcoming Events</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Events</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="events-section bg-grey bd-bottom padding">
        <div class="container">

                <div id="event-carousel" class="events-wrap owl-Carousel">
                    @forelse ($events as $event)
                    <div class="events-item">
                        <div class="event-thumb">
                            <img src="{{ asset($event->image) }}" alt="events" style='height: 100%; width: 100%; object-fit: fill;'>
                        </div>
                        <div class="event-details">
                            <h3>{{ $event->title }}</h3>
                            <div class="event-info">
                                <p><i class="ti-calendar"></i>Started On:{{ $event->date }}</p>
                                <p><i class="ti-calendar"></i>Started Time:{{ $event->time }}</p>
                                <p><i class="ti-location-pin"></i>{{ $event->address }}</p>
                            </div>
                            <p>{!! Str::limit(strip_tags($event->description), 80) !!}</p>
                            <a href="{{route('event.details',$event->id)}}"  class="default-btn">Read More</a>
                        </div>
                    </div><!-- Event-1 -->
                    @empty
            @endforelse
</div>

        </div>
    </section><!-- Events Section -->

    <section class="cta-section d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="cta-content">
                        <h2>Ready to Join With Us?</h2>
                        <p>The secret to happiness lies in helping others. Never underestimate the difference <br> the
                            abused and the helpless.</p>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-center text-right">
                    <a href="#" class="default-btn">Contact With Us</a>
                </div>
            </div>
        </div>
    </section><!-- Call To Action Section -->
@endsection
