{{ HTML::script('layouts/backend/plugins/jquery/jquery-2.1.0.min.js') }}
{{ HTML::script('layouts/backend/plugins/jquery/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('layouts/backend/plugins/jquery/jquery.cookie.js') }}
{{ HTML::script('layouts/backend/plugins/jquery/mousetrap.js') }}
{{ HTML::script('layouts/backend/plugins/jquery-ui/jquery-ui.min.js') }}
{{ HTML::script('layouts/backend/plugins/bootstrap/bootstrap.min.js') }}
{{ HTML::script('layouts/backend/plugins/justified-gallery/jquery.justifiedgallery.min.js') }}
{{ $footeritems }}
<script>
    var lara;
    lara = {{ json_encode(Config::get('cms'))}};
</script>
{{ HTML::script('layouts/backend/lara.js') }}