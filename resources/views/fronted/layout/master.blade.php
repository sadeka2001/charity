<!doctype html>
<html class="no-js" lang="en"> 
    <head>
        @include('fronted.layout.partials.head')
    </head>
    <body>
       
        <div class="site-preloader-wrap">
            <div class="spinner"></div>
        </div>
        
        <header id="header" class="header-section">
        @include('fronted.layout.partials.header')    
        </header><!-- /Header Section -->
        
        <div class="header-height"></div>
        
       @yield('content')
        
        <footer class="footer-section">
			@include('fronted.layout.partials.footer')
		</footer><!-- /Footer Section -->
        
		<a data-scroll href="#header" id="scroll-to-top"><i class="arrow_up"></i></a>
	
		<!-- jQuery Lib -->
		@include('fronted.layout.partials.script')

    </body>

<!-- Mirrored from html.dynamiclayers.net/dl/charitify/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 29 Jan 2024 16:35:39 GMT -->
</html>