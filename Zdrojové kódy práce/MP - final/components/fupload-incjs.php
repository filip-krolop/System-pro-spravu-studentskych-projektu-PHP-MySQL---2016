<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
	var jQueryFupload = $.noConflict(true);
</script>

<script>
	jQueryFupload('#fileToUpload').change(function() {
		var filepath = this.value;
		var m = filepath.match(/([^\/\\]+)$/);
		var filename = m[1];
		jQueryFupload('#filename').html(filename);
	});
	//@ sourceURL=pen.js
</script>