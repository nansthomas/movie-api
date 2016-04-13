var URL = 'http://localhost:8888/';

$('.send-attend').on('click', function() {
	// get the message id
	var event_id = $(this).attr('id');
	var data = event_id;

	var link = URL+'ajax/send-attend/'+data;

	if ($(this).hasClass('send-attend')) 
	{
		$(this).removeClass('send-attend').addClass('waiting').empty().append('En attente');
	}
	
	$.ajax({
		type: 'POST',
		url: link
	});

	return false;
});

$('.send-confirm-yes').on('click', function() {
	// get the message id
	var data = $(this).attr('id');
	data = data.split('-');

	var link = URL+'ajax/send-confirm-yes/'+data[0]+'/'+data[1];
	$(this).removeClass('send-confirm-yes').addClass('accepted').empty().append('Accepté');
	
	$.ajax({
		type: 'POST',
		url: link
	});

	return false;
});

$('.send-confirm-no').on('click', function() {
	// get the message id
	var data = $(this).attr('id');
	data = data.split('-');

	var link = URL+'ajax/send-confirm-no/'+data[0]+'/'+data[1];
	$(this).removeClass('send-confirm-no').addClass('refused').empty().append('Refusé');
	
	$.ajax({
		type: 'POST',
		url: link
	});

	return false;
});

var $search_movie = $(".search-movie");
var query;

if ($search_movie.length >= 0) {
	$search_movie.on('keyup', function() {
		if($search_movie.val().length > 3)
		{
			query = $search_movie.val().replace(" ", "+");

		    $.ajax({
		        url: URL+'ajax/search-movie/'+query,
		        dataType: "json",
		        success: function(json_data) {
					view_data = json_data.view_data;
					console.log(json_data);
		        }
		    });
		}
	});
}

