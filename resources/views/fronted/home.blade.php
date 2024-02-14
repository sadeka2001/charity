@extends('fronted.layout.master')
@section('content')
    <section class="slider-section">
        <div class="slider-wrapper">
            <div id="main-slider" class="nivoSlider">
                @foreach ($sliders as $slider)
                    <img src="{{ asset($slider->photo) }}" alt="{{ $slider->title }}"
                        title="#slider-caption-{{ $loop->iteration }}" />
                @endforeach
            </div><!-- /#main-slider -->

            @foreach ($sliders as $slider)
                <div id="slider-caption-{{ $loop->iteration }}" class="nivo-html-caption slider-caption">
                    <div class="display-table">
                        <div class="table-cell">
                            <div class="container">
                                <div class="slider-text">
                                    <h5 class="wow cssanimation fadeInBottom">Join Us Today</h5>
                                    <h1 class="wow cssanimation leFadeInRight sequence">{{ $slider->title }}</h1>
                                    <p class="wow cssanimation fadeInTop" data-wow-delay="1s">{{ $slider->sub_title }}</p>
                                    <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                        data-wow-delay="0.8s">Join With Us</a>
                                    <a href="#" class="default-btn wow cssanimation fadeInBottom"
                                        data-wow-delay="0.8s">Donet Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /#slider-caption-1 -->
            @endforeach
        </div>
    </section><!-- /#slider-Section -->



    {{-- <section class="promo-section bd-bottom">
        <div class="promo-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="promo-content">
                            <img src="{{ asset('assets/fronted/img/icon-1.png') }}" alt="prmo icon">
                            <h3>Make Donetion</h3>
                            <p>Help today because tomorrow you may be the one who needs helping!</p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="promo-content">
                            <img src="{{ asset('assets/fronted/img/icon-2.png') }}" alt="prmo icon">
                            <h3>Fundrising</h3>
                            <p>Help today because tomorrow you may be the one who needs helping! </p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 xs-padding">
                        <div class="promo-content">
                            <img src="{{ asset('assets/fronted/img/icon-3.png') }}" alt="prmo icon">
                            <h3>Become A Volunteer</h3>
                            <p>Help today because tomorrow you may be the one who needs helping! </p>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Promo Section --> --}}

    <section class="causes-section bg-grey bd-bottom padding">
        <div class="container">

            <div class="section-heading text-center mb-40">
                <h2>Our Services</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div class="causes-wrap row">
                @forelse($causes as $cause)
                    <div class="col-md-4 xs-padding">
                        <div class="causes-content">
                            <div class="causes-thumb">
                                <img src="{{ asset($cause->image) }}" alt="causes">
                                <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"><span
                                            class="wow cssanimation fadeInLeft">25%</span></div>
                                </div>
                            </div>
                            <div class="causes-details">
                                <h3>{{ $cause->title }}</h3>
                                <p> {!! Str::limit(strip_tags($cause->description), 80) !!}</p>
                                <div class="donation-box">
                                    <p><i class="ti-bar-chart"></i>Goal: {{ $cause->goal }}</p>
                                    <p><i class="ti-thumb-up"></i>Raised: $5000</p>
                                </div>
                                <a href="{{ route('cause.details', $cause->id) }}" class="read-more">Read More</a>
                            </div>
                        </div>


                    </div><!-- /Causes-1 -->
                @empty
                @endforelse
            </div>
        </div>
    </section><!-- /Causes Section -->

    <section class="about-section bd-bottom shape circle padding">
        <div class="container">
            <div class="row">
                {{-- <div class="col-md-4 xs-padding">
                    <div class="profile-wrap">
                        <img class="profile" src="{{ asset('assets/fronted/img/profile.jpg') }}" alt="profile">
                        <h3>Jonathan Smith <span>CEO & Founder of Charitify.</span></h3>
                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make
                            in the lives of the poor, the abused and the helpless.</p>
                        <img src="{{ asset('assets/fronted/img/sign.png') }}" alt="sign">
                    </div>
                </div> --}}
                <div class="col-md-12 xs-padding">
                    <div class="about-wrap row">
                        <div class="col-md-6 xs-padding">
                            <img src="{{asset($about->image)}}" alt="about-thumb">
                            <h3>About Us</h3>
                            <p>{!!Str::limit(strip_tags($about->description),150)!!}</p>
                            <a href="{{route('about')}}" class="default-btn">Read More</a>
                        </div>
                        <div class="col-md-6 xs-padding">
                            <img src="{{ asset('assets/fronted/img/mission.jpg') }}" alt="about-thumb">
                            <h3>Our History</h3>
                            <p>{!!Str::limit(strip_tags($about->mission),150)!!}</p>
                            <a href="{{route('about')}}" class="default-btn">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Causes Section -->

    <section class="campaigns-section bd-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 xs-padding">
                    <div class="campaigns-wrap">
                        <h4>Featured Campaigns</h4>
                        <h2>{{$video->title}}</h2>
                        <p>{!! $video->description !!}</p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 35%;" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"><span class="wow cssanimation fadeInLeft">35%</span>
                            </div>
                        </div>
                        <div class="donation-box">
                            <h3><i class="ti-bar-chart"></i>Goal: {{$video->goal}}</h3>
                            <h3><i class="ti-thumb-up"></i>Raised: $55000</h3>
                        </div>
                        <a href="#" class="default-btn">Donate Now</a>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="video-wrap">
                        <img src="{{ asset('assets/fronted/img/video.jpg') }}" alt="video">
                        <div class="play">
                            <a class="img-popup" data-autoplay="true" data-vbtype="video"
                                href="{{$video->link}}"><i class="ti-control-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Featured Campaigns Section -->

    <section class="team-section bg-grey bd-bottom circle shape padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Meet Out Volunteers</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div class="team-wrapper row">

                <div class="col-lg-6 sm-padding">

                    <div class="team-wrap row">
                        @forelse ($volunteers as $volunteer)
                            <div class="col-md-6">
                                <div class="team-details">
                                    <img src="{{ asset($volunteer->img) }}" alt="team">
                                    <div class="hover">
                                        <h3>{{ $volunteer->name }} <span>{{ $volunteer->designation }}</span></h3>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                        <!-- /Team-1 -->
                    </div>

                </div>


                <div class="col-lg-6 sm-padding">
                    <div class="team-content">
                        <h2>Become a Volunteer?</h2>
                        <h3>Join your hand with us for a better life and beautiful future.</h3>
                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make
                            in the lives of the poor, the abused and the helpless.</p>
                        <ul class="check-list">
                            <li><i class="fa fa-check"></i>We are friendly to each other.</li>
                            <li><i class="fa fa-check"></i>If you join with us,We will give you free training.</li>
                            <li><i class="fa fa-check"></i>Its an opportunity to help poor children.</li>
                            <li><i class="fa fa-check"></i>No goal requirements.</li>
                            <li><i class="fa fa-check"></i>Joining is tottaly free. We dont need any money from you.</li>
                        </ul>
                        <a href="#" class="default-btn">Join With Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Team Section -->

    <section id="counter" class="counter-section">
        <div class="container">
            <ul class="row counters">
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-money"></i>
                        <h3 class="counter">85389</h3>
                        <h4 class="text-white">Money Donated</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-face-smile"></i>
                        <h3 class="counter">10693</h3>
                        <h4 class="text-white">Volunteer Around The World</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-user"></i>
                        <h3 class="counter">50177</h3>
                        <h4 class="text-white">People Impacted</h4>
                    </div>
                </li>
                <li class="col-md-3 col-sm-6 sm-padding">
                    <div class="counter-content">
                        <i class="ti-comments"></i>
                        <h3 class="counter">669</h3>
                        <h4 class="text-white">Positive Feedbacks</h4>
                    </div>
                </li>
            </ul>
        </div>
    </section><!-- Counter Section -->

    <section class="events-section bg-grey bd-bottom padding">

        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Upcoming Events</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->

            <div id="event-carousel" class="events-wrap owl-Carousel">
                @forelse ($events as $event)
                    <div class="events-item">

                        <div class="event-thumb">
                            <img src="{{ asset($event->image) }}" alt="events">
                        </div>
                        <div class="event-details">
                            <h3>{{ $event->title }}</h3>
                            <div class="event-info">
                                <p><i class="ti-calendar"></i><time datetime="January 01,2018"
                                        class="post_date">{{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} & {{ \Carbon\Carbon::parse($event->time)->format('h:i:s A') }}</time>
                                </p>

                                <p><i class="ti-location-pin"></i>{{ $event->address }}</p>
                            </div>
                            <p>{!! Str::limit(strip_tags($event->description), 80) !!}</p>
                            <a href="{{ route('event.details', $event->id) }}" class="default-btn">Read More</a>
                        </div>

                    </div>
                @empty
                @endforelse


            </div>
        </div>
    </section><!-- Events Section -->

    <section class="testimonial-section bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>What People Say</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div id="testimonial-carousel" class="testimonial-carousel owl-carousel">
                @forelse ($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <p>{!! str::limit(strip_tags($testimonial->description), 80) !!}</p>
                        <div class="testi-footer">
                            <img src="{{ asset($testimonial->image) }}" alt="profile">
                            <h4>{{ $testimonial->name }} <span>{{ $testimonial->designation }} </span></h4>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section><!-- Testimonial Section -->

    <section class="blog-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="section-heading text-center mb-40">
                <h2>Recent News</h2>
                <span class="heading-border"></span>
                <p>Help today because tomorrow you may be the one who <br> needs more helping!</p>
            </div><!-- /Section Heading -->
            <div class="row">
                <div class="col-lg-12 xs-padding">
                    <div class="blog-items grid-list row">
                        @forelse($recent_works as $recent_work)
                            <div class="col-md-4 padding-15">
                                <div class="blog-post">
                                    <img src="{{ asset($recent_work->image) }}" alt="blog post">
                                    <div class="blog-content">
                                        <span class="date"><i class="fa fa-clock-o"></i> January 01.2021</span>
                                        <h3><a href="#">{{ $recent_work->title }}</a></h3>
                                        <p>{!! str::limit(strip_tags($recent_work->description), 80) !!}</p>
                                        <a href="{{ route('recent.work.details', $recent_work->id) }}"
                                            class="post-meta">Read More</a>
                                    </div>
                                </div>
                            </div><!-- Post 1 -->
                        @empty
                        @endforelse

                    </div>
                </div><!-- Blog Posts -->
            </div>
        </div>
    </section><!-- Blog Section -->

    <div class="sponsor-section bd-bottom">
        <div class="container">
            <div class="row justify-content-center">
                @forelse($brands as $brand)
                    <div class=" col-6 col-sm-4 col-md-3 col-lg-2">
                        <a href="{{ $brand->link }}"><img class="img-fluid sponsor-banner"
                                src="{{ asset($brand->logo) }}" alt="sponsor-image"></a>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
@endsection
