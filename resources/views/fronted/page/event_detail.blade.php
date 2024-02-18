@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Event Details</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
                    <li class="breadcrumb-item active">Blog</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="blog-section bg-grey padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 sm-padding">
                    <div class="blog-items single-post row">
                        <img src="{{ asset($event_detail->image) }}" alt="blog post">
                        <h4><i class="ti-calendar"></i><time datetime="January 01,2018" class="post_date">
                                {{ \Carbon\Carbon::parse($event_detail->date)->format('M d, Y') }} &
                                {{ \Carbon\Carbon::parse($event_detail->time)->format('h:i:s A') }}</time>
                        </h4>
                        <h2>{{ $event_detail->title }}</h2>
                      
                        <p>{!! $event_detail->description !!}</p>

                    </div>
                </div><!-- Blog Posts -->
                <div class="col-lg-3 sm-padding">
                    <div class="sidebar-wrap">

                        <div class="sidebar-widget mb-50">
                            <h4>Recent Posts</h4>
                            <ul class="recent-posts">

                                    @forelse (getEvents() as $event)
                                    <li>
                                        <img src="{{ asset($event->image) }}" alt="recent post">
                                        <div>
                                            <h4><a href="{{route('event.details',$event->id)}}">{{ Str::limit(strip_tags($event->description ),15) }}</a></h4>
                                            <span class="date"><i class="fa fa-clock-o"></i>
                                                {{ $event->date }}</span>
                                        </div>
                                    </li>
                                @empty
                                    <h5>No recent events yet!</h5>
                                @endforelse


                            </ul>
                        </div>

                        <!-- Recent Posts -->

                    </div><!-- /Sidebar Wrapper -->
                </div>
            </div>
        </div>
    </section><!-- /Blog Section -->

@endsection

