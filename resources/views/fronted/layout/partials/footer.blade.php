<section class="widget-section padding">
    <div class="container">
        <div class="widget-wrap row">
            <div class="col-md-4 xs-padding">
                <div class="widget-content">
                    <img src="{{ setting('site_logo') !=null ? asset(setting('site_logo')):'' }}" alt="logo">
                    <p>{{ setting('site_description') ?? '' }}</p>
                    <ul class="social-icon">
                        <li><a href="{{ setting('facebook') ?? '' }}" target="{{ setting('facebook')?'_blank' :'' }}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{ setting('twitter') ?? '' }}" target="{{ setting('twitter')?'_blank' :'' }}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{ setting('facebook') ?? '' }}"><i class="fa fa-pinterest" ></i></a></li>
                        <li><a href="{{ setting('instragram') ?? '' }}" target="{{ setting('instragram')?'_blank' :'' }}"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{ setting('linkedin') ?? '' }}" target="{{ setting('linkedin')?'_blank' :'' }}"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4 xs-padding">
                <div class="widget-content">
                    <h3>Recent Campaigns</h3>
                    <ul class="widget-link">
                        @forelse (getEvents() as $event)
                        <li><a href="{{ route('event.details', $event->id) }}">{{ $event->title }}
                                <span>-{{ $event->created_at->diffForHumans() }}</span></a></li>
                    @empty
                        <li>No Campaigns yet!</li>
                    @endforelse
                    </ul>
                </div>
            </div>
            <div class="col-md-4 xs-padding">
                <div class="widget-content">
                    <h3>Charitify Location</h3>
                    <ul class="address">
                        <li><i class="ti-email"></i> {{ setting('site_email') ?? '' }}</li>
                        <li><i class="ti-mobile"></i>{{ setting('site_phone') ?? '' }}</li>
                        <li><i class="ti-world"></i> {{ setting('website') ?? '' }}</li>
                        <li><i class="ti-location-pin"></i> {{ setting('site_address') ?? '' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section><!-- ./Widget Section -->

<footer class="footer-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 sm-padding">
                <div class="copyright">&copy; 2021 Charitify Powered by DynamicLayers</div>
            </div>
            <div class="col-md-6 sm-padding">
                <ul class="footer-social">
                    <li><a href="#">Orders</a></li>
                    <li><a href="#">Terms</a></li>
                    <li><a href="#">Report Problem</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
