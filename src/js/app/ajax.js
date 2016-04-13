var URL = 'http://localhost:8888/';

$('.send-attend').on('click', function() {
	// get the message id
	var event_id = $(this).attr('id');
	var data = 'event_id='+event_id;

	var link = URL+'ajax/send-attend';

	if ($(this).hasClass('send-attend')) 
	{
		$(this).removeClass('send-attend').addClass('waiting').empty().append('En attente');
	}
	
	$.ajax({
		type: 'GET',
		data: data,
		url: link
	});

	return false;
});

$('.send-confirm-yes').on('click', function() {
	// get the message id
	var data = $(this).attr('id');
	data = data.split('-');
	data = 'user_id='+data[0]+'&event_id='+data[1];

	var link = URL+'ajax/send-confirm-yes';
	$(this).removeClass('send-confirm-yes').addClass('accepted').empty().append('Accepté');
	
	$.ajax({
		type: 'GET',
		data: data,
		url: link
	});

	return false;
});

$('.send-confirm-no').on('click', function() {
	// get the message id
	var data = $(this).attr('id');
	data = data.split('-');
	data = 'user_id='+data[0]+'&event_id='+data[1];

	var link = URL+'ajax/send-confirm-no';
	$(this).removeClass('send-confirm-no').addClass('refused').empty().append('Refusé');
	
	$.ajax({
		type: 'GET',
		data: data,
		url: link
	});

	return false;
});

var $search_movie = $(".search-movie");
var query_movie;

if ($search_movie.length >= 0) {
	$search_movie.on('keyup', function() {
		if($search_movie.val().length > 2)
		{
			query_movie = $search_movie.val().replace(" ", "+");

		    $.ajax({
		        type: 'GET',
		        data: 'query='+query_movie,
		        url: URL+'ajax/search-movie',
		        dataType: "json",
		        success: function(json_data) {
					view_data = json_data.view_data;
					console.log(view_data);
		        }
		    });
		}
	});
}

function doWork(data) {
	$result_div = $('.result-live');
	$result_div.remove();
	for (var i = 0; i < data.features.length; i++) {
		$selector = '.result-'.i;
		$result_div.children($selector).append(data.features[i].properties.label);
		// var adress = document.createElement("div").classlist.add('result-' + i);
		// $tata.empty().append();
	}
}

var $search_adress = $(".search-adress");
var query_adress;

if ($search_adress.length >= 0) {
	$search_adress.on('keyup', function() {
		if($search_adress.val().length > 4)
		{
			query_adress = $search_adress.val().replace(" ", "+");

		    $.ajax({
		        type: 'GET',
		        data: 'query='+query_adress,
		        url: URL+'ajax/search-adress',
		        dataType: "json",
		        success: function(json_data) {
					// view_data = json_data.view_data;
					// // console.log(view_data);
					doWork(json_data);
		        }
		    });


		}
	});
}



// SELECT DIV
// (json_data.tata.label);

// append.child 
// for (i = 0; i+++)
