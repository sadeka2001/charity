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
                @forelse ($causes as $cause)
                    <div class="col-md-4 padding-15">
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
                                <p>{!! Str::limit(strip_tags($cause->description, 80)) !!}</p>
                                <div class="donation-box">
                                    <p><i class="ti-bar-chart"></i>Goal: {{ $cause->goal }}</p>
                                    <p><i class="ti-thumb-up"></i>Raised: $5000</p>
                                </div>
                                <a href="{{route('cause.details',$cause->id)}}" class="read-more">Read More</a>
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

<!-- jQuery Lib -->
{{-- <script src="js/vendor/jquery-1.12.4.min.js"></script>
		<!-- Bootstrap JS -->
		<script src="js/vendor/bootstrap.min.js"></script>
		<!-- Tether JS -->
		<script src="js/vendor/tether.min.js"></script>
        <!-- Imagesloaded JS -->
        <script src="js/vendor/imagesloaded.pkgd.min.js"></script>
		<!-- OWL-Carousel JS -->
		<script src="js/vendor/owl.carousel.min.js"></script>
		<!-- isotope JS -->
		<script src="js/vendor/jquery.isotope.v3.0.2.js"></script>
		<!-- Smooth Scroll JS -->
		<script src="js/vendor/smooth-scroll.min.js"></script>
		<!-- venobox JS -->
		<script src="js/vendor/venobox.min.js"></script>
        <!-- ajaxchimp JS -->
        <script src="js/vendor/jquery.ajaxchimp.min.js"></script>
        <!-- Counterup JS -->
		<script src="js/vendor/jquery.counterup.min.js"></script>
        <!-- waypoints js -->
		<script src="js/vendor/jquery.waypoints.v2.0.3.min.js"></script>
        <!-- Slick Nav JS -->
        <script src="js/vendor/jquery.slicknav.min.js"></script>
        <!-- Nivo Slider JS -->
        <script src="js/vendor/jquery.nivo.slider.pack.js"></script>
        <!-- Letter Animation JS -->
		<script src="js/vendor/letteranimation.min.js"></script>
        <!-- Wow JS -->
		<script src="js/vendor/wow.min.js"></script>
		<!-- Contact JS -->
		<script src="js/contact.js"></script>
		<!-- Main JS -->
		<script src="js/main.js"></script>

    </body>

<!-- Mirrored from html.dynamiclayers.net/dl/charitify/causes.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Jan 2024 16:35:55 GMT -->
</html> --}}
