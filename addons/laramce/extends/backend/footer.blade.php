{{ HTML::script('addons/laramce/tinymce/tinymce.min.js') }}
<script>
tinymce.init({
	selector: "textarea.rte",
	relative_urls: false,
	remove_script_host: false,
	plugins: [
	"{{ Config::get('cms.auto_settings.backend.laramce.plugins') }}"
	],
	content_css: "/layouts/frontend/{{ Config::get('cms.theme') }}/css/main.css",
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons"
});
</script>