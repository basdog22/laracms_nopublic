<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>{{ Commoner::title() }}</title>
        <meta name="description" content="{{ Commoner::description() }}">
        <meta name="viewport" content="width=device-width">

        {{ HTML::style('layouts/frontend/lara/css/bootstrap.min.css') }}
        {{ HTML::style('layouts/frontend/lara/css/icomoon-social.css') }}
        {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800') }}
        {{ HTML::style('layouts/frontend/lara/css/leaflet.css') }}
        <!--[if lte IE 8]>{{ HTML::style('layouts/frontend/lara/css/leaflet.ie.css') }}<![endif]-->
        {{ HTML::style('layouts/frontend/lara/css/main.css') }}
        {{ HTML::script('layouts/frontend/lara/js/modernizr-2.6.2-respond-1.1.0.min.js') }}

    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        @if(Session::has('message'))<div class="alert alert-danger" role="alert">
            {{ Session::get('message') }}
        </div>@endif
        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						{{ Block::show('top_extras_menu') }}
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
                    {{ Block::show('mainmenu') }}
				</nav>
			</div>
		</div>

        <!-- Homepage Slider -->
        <div class="homepage-slider">
            {{ Block::show('slider') }}
        </div>
        <!-- End Homepage Slider -->

		<!-- Press Coverage -->
        <div class="section">
	    	<div class="container">
				<div class="row">
                    @yield('content')
                    {{ Block::show('widgets') }}
				</div>
			</div>
		</div>
		<!-- Press Coverage -->

		<!-- Services -->
        <div class="section">
	        <div class="container">
	        	<div class="row">
                    {{ Block::show('boxes') }}
	        	</div>
	        </div>
	    </div>
	    <!-- End Services -->

		<!-- Call to Action Bar -->
	    <div class="section section-white">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="calltoaction-wrapper">
                            {{ Block::show('call_to_action') }}
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Call to Action Bar -->




	    <!-- Footer -->
	    <div class="footer">
	    	<div class="container">
		    	<div class="row">
                    {{ Block::show('footer_boxes') }}
		    	</div>
		    	<div class="row">
		    		<div class="col-md-12">
		    			<div class="footer-copyright">&copy; 2013 mPurpose. All rights reserved.</div>
		    		</div>
		    	</div>
		    </div>
	    </div>

        <!-- Javascripts -->
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js') }}
        <script>window.jQuery || document.write('<script src="layouts/frontend/lara/js/jquery-1.9.1.min.js"><\/script>')</script>
        {{ HTML::script('layouts/frontend/lara/js/bootstrap.min.js') }}
        {{ HTML::script('http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js') }}
        {{ HTML::script('layouts/frontend/lara/js/jquery.fitvids.js') }}
        {{ HTML::script('layouts/frontend/lara/js/jquery.sequence-min.js') }}
        {{ HTML::script('layouts/frontend/lara/js/jquery.bxslider.js') }}
        {{ HTML::script('layouts/frontend/lara/js/main-menu.js') }}
        {{ HTML::script('layouts/frontend/lara/js/template.js') }}


    </body>
</html>