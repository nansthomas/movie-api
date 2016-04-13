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