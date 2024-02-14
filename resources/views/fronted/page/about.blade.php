@extends('fronted.layout.master')
@section('content')
<div class="pager-header">
            <div class="container">
                <div class="page-content">
                    <h2>About Us</h2>
                    <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div><!-- /Page Header -->

        <section class="about-section bg-grey bd-bottom padding">
            <div class="container">
                <div class="row about-wrap">

                    <div class="col-md-6 xs-padding">
                        <div class="about-image">
                            <img src="{{ asset($about->image) }}" alt="about image">
                        </div>
                    </div>
                    <div class="col-md-6 xs-padding">
                        <div class="about-content">
                            <h2>{{$about->title}}</h2>
                            <p>{!!$about->description!!}</p>
                            {{-- <a href="#" class="default-btn">More About Us</a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="about-section bg-grey bd-bottom padding">
            <div class="container">
                <div class="row about-wrap">

                    <div class="col-md-12 xs-padding">
                        <div class="about-content">
                            <h2>Our History</h2>
                            <p>{!!$about->mission!!}</p>
                            {{-- <a href="#" class="default-btn">More About Us</a> --}}
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- /About Section -->
     @endsection



