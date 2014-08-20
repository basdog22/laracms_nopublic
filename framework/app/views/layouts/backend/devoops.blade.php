<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{{Config::get('cms.title')}}</title>
	<meta name="description" content="description">
	<meta name="author" content="DevOOPS">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    {{ $header }}
</head>
<body>
<div id="screensaver">
    <canvas id="canvas"></canvas>
    <i class="fa fa-lock" id="screen_unlock"></i>
</div>
{{ $navbar }}
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">

         {{ $sidebar }}

		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
            <div id="notifications-container">
                @if(Session::has('message'))
                {{ Session::get('message') }}
                @endif
            </div>


            {{ $content }}
		</div>
		<!--End Content-->
	</div>
</div>
<div class="modal fade" id="laraModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <!-- content dynamically inserted -->
            </div>
        </div>
    </div>
</div>
{{ $footer }}

</body>
</html>
