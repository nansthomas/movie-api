$('.send-attend').on('click', function() {
	// get the message id
	var event_id = $(this).attr('id');
	var data = event_id;

	var url = 'http://localhost:8888/ajax/send-attend/'+data;

	if ($(this).hasClass('send-attend')) 
	{
		$(this).removeClass('send-attend').addClass('waiting').empty().append('En attente');
	}
	
	$.ajax({
		type: 'POST',
		url: url
	});

	return false;
});