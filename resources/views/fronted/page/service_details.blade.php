@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Recent Services</h2>
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
                        <img src="{{ asset($service_detail->image) }}" alt="blog post">
                        <h2>{{ $service_detail->title }}</h2>

                        <p>{!! $service_detail->description !!}</p>
                    </div>
                </div><!-- Blog Posts -->
                <div class="col-lg-3 sm-padding">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget mb-50">
                            <h4>Recent service</h4>
                            <ul class="recent-posts">
                                @forelse (getServices() as $service)
                                    <li>
                                        <img src="{{ asset($service->image) }}" alt="blog post">
                                        <div>
                                            <h4><a
                                                    href="{{ route('service.details', $service->id) }}">{{ Str::limit(strip_tags($service->description), 15) }}</a>
                                            </h4>
                                            <span class="date"><i class="fa fa-clock-o"></i>
                                                {{ $service->created_at->format('F d, Y') }}</span>
                                        </div>
                                    </li>
                                @empty
                                    <h5>No recent services yet!</h5>
                                @endforelse
                            </ul>
                        </div>

                    </div><!-- /Sidebar Wrapper -->
                </div>
            </div>
        </div>
    </section><!-- /Blog Section -->

    {{-- <section class="widget-section padding">
        <div class="container">
            <div class="widget-wrap row">
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <img src="img/logo-light.png" alt="logo">
                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make
                            in the lives of the poor</p>
                        <ul class="social-icon">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <h3>Recent Campaigns</h3>
                        <ul class="widget-link">
                            <li><a href="#">First charity activity of this summer. <span>-1 Year Ago</span></a></li>
                            <li><a href="#">Big charity: build school for poor children. <span>-2 Year Ago</span></a>
                            </li>
                            <li><a href="#">Clean-water system for rural poor. <span>-2 Year Ago</span></a></li>
                            <li><a href="#">Nepal earthqueak donation campaigns. <span>-3 Year Ago</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 xs-padding">
                    <div class="widget-content">
                        <h3>Charitify Location</h3>
                        <ul class="address">
                            <li><i class="ti-email"></i> Info@YourDomain.com</li>
                            <li><i class="ti-mobile"></i> +(333) 052 39876</li>
                            <li><i class="ti-world"></i> Www.YourWebsite.com</li>
                            <li><i class="ti-location-pin"></i> 60 Grand Avenue. Central New Road 0708, USA</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
