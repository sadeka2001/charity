@extends('fronted.layout.master')
@section('content')
    <!-- /Header Section -->
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Contact With Us</h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div><!-- /Page Header -->

    <section class="contact-section padding">
        <div id="google_map"></div><!-- /#google_map -->
        <div class="container">
            <div class="row contact-wrap">
                <div class="col-md-6 xs-padding">
                    <div class="contact-info">
                        <h3>Get in touch</h3>
                        <p>The secret to happiness lies in helping others. Never underestimate the difference YOU can make
                            in the lives of the poor, the abused and the helpless.</p>
                        <p>The secret to happiness lies in helping others. Never underestimate the difference.</p>
                        <ul>
                            <li><i class="ti-location-pin"></i> {{ setting('site_address') ?? '' }}</li>
                            <li><i class="ti-mobile"></i> {{ setting('site_phone') ?? '' }}</li>
                            <li><i class="ti-email"></i> {{ setting('site_email') ?? '' }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 xs-padding">
                    <div class="contact-form">
                        <h3>Drop us a line</h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <form action="{{ route('contact.store') }}" method="post" id="ajax_form" class="form-horizontal">
                            @csrf
                            <div class="form-group colum-row row">
                                <div class="col-sm-6">
                                    <input type="text" id="name" name="name" class="form-control"
                                        placeholder="Name" required>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" id="email" name="email" class="form-control"
                                        placeholder="Email" required>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="phone" id="phone" name="phone" class="form-control"
                                            placeholder="Phone" required>
                                    </div>
                                </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message"
                                        required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button id="submit" class="default-btn" type="submit">Send Message</button>
                                </div>
                            </div>
                            <div id="form-messages" class="alert" role="alert"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Contact Section -->


    <!-- jQuery Lib -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/fronted/js/vendor/bootstrap.min.js') }}"></script>
    <!-- Tether JS -->
    <script src="{{ asset('assets/fronted/js/vendor/tether.min.js') }}"></script>
    <!-- Imagesloaded JS -->
    <script src="{{ asset('assets/fronted/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <!-- OWL-Carousel JS -->
    <script src="{{ asset('assets/fronted/js/vendor/owl.carousel.min.js') }}"></script>
    <!-- isotope JS -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery.isotope.v3.0.2.js') }}"></script>
    <!-- Smooth Scroll JS -->
    <script src="{{ asset('assets/fronted/js/vendor/smooth-scroll.min.js') }}"></script>
    <!-- venobox JS -->
    <script src="{{ asset('assets/fronted/js/vendor/venobox.min.js') }}"></script>
    <!-- ajaxchimp JS -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery.ajaxchimp.min.js') }}"></script>
    <!-- Counterup JS -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery.counterup.min.js') }}"></script>
    <!-- waypoints js -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery.waypoints.v2.0.3.min.js') }}"></script>
    <!-- Slick Nav JS -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery.slicknav.min.js') }}"></script>
    <!-- Nivo Slider JS -->
    <script src="{{ asset('assets/fronted/js/vendor/jquery.nivo.slider.pack.js') }}"></script>
    <!-- Letter Animation JS -->
    <script src="{{ asset('assets/fronted/js/vendor/letteranimation.min.js') }}"></script>
    <!-- Wow JS -->
    <script src="{{ asset('assets/fronted/js/vendor/wow.min.js') }}"></script>
    <!-- Contact JS -->
    <script src="{{ asset('assets/fronted/js/contact.js') }}"></script>
    <!-- Google Map JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBGm_weV-pxqGWuW567g78KhUd7n0p97RY"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/fronted/js/main.js') }}"></script>

    <script>
        (function($) {
            "use strict";
            google.maps.event.addDomListener(window, 'load', init);

            function init() {

                var mapOptions = {
                    zoom: 11,
                    center: new google.maps.LatLng(40.6700, -73.9400),
                    scrollwheel: false,
                    navigationControl: false,
                    mapTypeControl: false,
                    scaleControl: false,
                    draggable: false,
                    styles: [{
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": "-100"
                        }]
                    }, {
                        "featureType": "administrative.province",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    }, {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": 65
                        }, {
                            "visibility": "on"
                        }]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "lightness": "50"
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": "-100"
                        }]
                    }, {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [{
                            "lightness": "30"
                        }]
                    }, {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [{
                            "lightness": "40"
                        }]
                    }, {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": -100
                        }, {
                            "visibility": "simplified"
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                            "hue": "#ffff00"
                        }, {
                            "lightness": -25
                        }, {
                            "saturation": -97
                        }]
                    }, {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [{
                            "lightness": -25
                        }, {
                            "saturation": -100
                        }]
                    }]
                };

                var mapElement = document.getElementById('google_map');

                var map = new google.maps.Map(mapElement, mapOptions);

                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    title: 'Location!'
                });
            }

        })(jQuery);
    </script>
@endsection
