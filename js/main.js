jQuery(document).ready(function($){
	$("employee-row").click(function() {
		window.location = $(this).data("href");
	});
});