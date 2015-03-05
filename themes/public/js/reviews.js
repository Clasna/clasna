$(document).ready(function() {
	$('.arrow-down-review:odd').addClass('second-review').removeClass('first-review');

	$('#reviews .pagination-centered-right-block select').on('change', function(){
		var limit = $(this).val();
		window.location = "/reviews?limit="+limit;
	});
	$('#articles .pagination-centered-right-block select').on('change', function(){
		var limit = $(this).val();
		window.location = "/articles?limit="+limit;
	})

});