@extends('fronted.layout.master')
@section('content')
    <div class="pager-header">
        <div class="container">
            <div class="page-content">
                <h2>Recent News </h2>
                <p>Help today because tomorrow you may be the one who <br>needs more helping!</p>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{('/')}}">Home</a></li>
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
                        <img src="{{ asset($recent_details->image) }}" alt="blog post">
                        <h2>{{ $recent_details->title }}</h2>

                        <p>{!! $recent_details->description !!}</p>

                    </div>
                </div><!-- Blog Posts -->
                <div class="col-lg-3 sm-padding">
                    <div class="sidebar-wrap">
                        <div class="sidebar-widget mb-50">
                                <h4>Recent Posts</h4>
                                <ul class="recent-posts">
                                    @forelse (getNews() as $news)
                                    <li>
                                        <img src="{{ asset($news->image) }}" alt="blog post">
                                        <div>
                                            <h4><a href="{{route('recent.work.details',$news->id)}}">{{Str::limit(strip_tags($news->description ),15) }}</a></h4>
                                            <span class="date"><i class="fa fa-clock-o"></i> {{ $news->created_at->format('F d, Y') }}</span>
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

@endsection




{{--
		<!-- jQuery Lib -->
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
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

<!-- Mirrored from html.dynamiclayers.net/dl/charitify/blog-single.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Jan 2024 16:36:05 GMT -->
</html>  --}}
