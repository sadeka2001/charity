@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Recent Services</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">Causes</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="causes-section bg-grey bd-bottom padding">
        <div class="container">
            <div class="causes-wrap row">
                @forelse ($services as $service)
                    <div class="col-md-4 padding-15">
                        <div class="causes-content">
                            <div class="causes-thumb">
                                <img src="{{ asset($service->image) }}" alt="causes">
                                <a href="#" class="donate-btn">Donate Now<i class="ti-plus"></i></a>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                                        aria-valuemin="0" aria-valuemax="100"><span
                                            class="wow cssanimation fadeInLeft">25%</span></div>
                                </div>
                            </div>
                            <div class="causes-details">
                                <h3>{{ $service->title }}</h3>
                                <p>{!! Str::limit(strip_tags($service->description, 80)) !!}</p>
                                <div class="donation-box">
                                    <p><i class="ti-bar-chart"></i>Goal: {{ $service->goal }}</p>
                                    <p><i class="ti-thumb-up"></i>Raised: $5000</p>
                                </div>service
                                <a href="{{route('service.details',$service->id)}}" class="read-more">Read More</a>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                <!-- /Causes-1 -->


            </div>
        </div>
    </section><!-- /Causes Section -->
@endsection

