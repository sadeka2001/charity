
<div class="top-header">
    <div class="container">
        <div class="top-content-wrap row">
            <div class="col-sm-8">
                <ul class="left-info">
                    <li><a href="#"><i class="ti-email"></i>{{ setting('site_email') ?? '' }}</a></li>
                    <li><a href="#"><i class="ti-mobile"></i>+{{ setting('site_phone') ?? '' }}</a></li>
                </ul>
            </div>
            <div class="col-sm-4 d-none d-md-block">
                <ul class="right-info">
                    <li><a href="{{ setting('facebook') ?? '' }}" target="{{ setting('facebook')?'_blank' :'' }}"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="{{ setting('twitter') ?? '' }}" target="{{ setting('twitter')?'_blank' :'' }}"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="{{ setting('facebook') ?? '' }}"><i class="fa fa-pinterest" ></i></a></li>
                    <li><a href="{{ setting('instragram') ?? '' }}" target="{{ setting('instragram')?'_blank' :'' }}"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="{{ setting('linkedin') ?? '' }}" target="{{ setting('linkedin')?'_blank' :'' }}"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bottom-header">
    <div class="container">
        <div class="bottom-content-wrap row">
            <div class="col-sm-4">
                <div class="site-branding">
                    <a href="{{url('/')}}"><img src="{{ setting('site_logo') !=null ? asset(setting('site_logo')):'' }}" alt=""></a>
                </div>
            </div>
           <div class="col-sm-8 text-right">
               <ul id="mainmenu" class="nav navbar-nav nav-menu">
                    <li class="active"> <a href="{{('/') }}">Home</a>

                    </li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li><a href="{{ route('cause') }}">Service</a></li>
                    <li><a href="{{ route('event') }}">Event</a></li>
                    <li><a href="#">Pages</a>
                        <ul>
                           <li><a href="{{ route('gallery') }}">Gallery</a></li>
                           <li><a href="{{ route('team') }}">Volunteers</a></li>

                        </ul>
                    </li>

                    <li> <a href="{{ route('contact.show') }}">Contact</a></li>
                </ul>
                <a href="#" class="default-btn">Donet Now</a>
           </div>
        </div>
    </div>
</div>
