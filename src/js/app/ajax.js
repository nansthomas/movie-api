var URL = 'http://localhost:8888/';

$('.send-attend').on('click', function () {
  // get the message id
  var event_id = $(this).attr('id');
  var data = 'event_id=' + event_id;

  var link = URL + 'ajax/send-attend';

  if ($(this).hasClass('send-attend')) {
    $(this).removeClass('send-attend').addClass('waiting').empty().append('En attente');
  }

  $.ajax({
    type: 'GET',
    data: data,
    url: link,
  });

  return false;
});

$('.send-confirm-yes').on('click', function () {
  // get the message id
  var data = $(this).attr('id');
  data = data.split('-');
  data = 'user_id=' + data[0] + '&event_id=' + data[1];

  var link = URL + 'ajax/send-confirm-yes';
  $(this).removeClass('send-confirm-yes').addClass('accepted').empty().append('Accepté');

  $.ajax({
    type: 'GET',
    data: data,
    url: link,
  });

  return false;
});

$('.send-confirm-no').on('click', function () {
  // get the message id
  var data = $(this).attr('id');
  data = data.split('-');
  data = 'user_id=' + data[0] + '&event_id=' + data[1];

  var link = URL + 'ajax/send-confirm-no';
  $(this).removeClass('send-confirm-no').addClass('refused').empty().append('Refusé');

  $.ajax({
    type: 'GET',
    data: data,
    url: link,
  });

  return false;
});

function doWorkMovie(data) {

  $('.movie-list').children('div').remove();

  for (var i = 0; i < 4; i++) {
    var value = data[i].title;
    var cover = data[i].poster_path;
    $('.movie-list').append('<div class="cover-list"><img src="https://image.tmdb.org/t/p/original' + cover + '"><p id="item-' + i + '" class="movie-propose" onClick="return getMovie(this)">' + value + '</p></div>');
  }
}

function getMovie(e){
  $('#movie_name').val(e.innerHTML);
  $('.movie-list').children('div').remove();
  $('#movie-control').removeClass('is-loading');
  $('#movie-control').addClass('has-icon has-icon-right');
  $('#movie_name').addClass('is-success');
}


var $search_movie = $(".search-movie");
var query_movie;

if ($search_movie.length >= 0) {
	$search_movie.on('keyup', function() {
    if ($search_movie.val().length > 4) {
      query_movie = $search_movie.val().replace(" ", "+");

      $.ajax({
        type: 'GET',
        data: 'query=' + query_movie,
        url: URL + 'ajax/search-movie',
        dataType: 'json',
        success: function (json_data) {
          doWorkMovie(json_data);
        },
      });
    }
  });
}

function doWorkAdress(data) {

  $('.result-list').children('p').remove();

  for (var i = 0; i < data.features.length; i++) {
    var value = data.features[i].properties.label;
    $('.result-list').append('<p id="item-' + i + '" class="adress-propose" onClick="return getAdress(this)">' + value + '</div>');
  }
}

function getAdress(e) {
  $('#adress').val(e.innerHTML);
  $('.result-list').children('p').remove();
  $('#adress-control').removeClass('is-loading');
  $('#adress-control').addClass('has-icon has-icon-right');
  $('#adress').addClass('is-success');
}

var $search_adress = $(".search-adress");
var query_adress;

if ($search_adress.length >= 0) {
	$search_adress.on('keyup', function() {
    if ($search_adress.val().length > 4) {
      query_adress = $search_adress.val().replace(" ", "+");

      $.ajax({
        type: 'GET',
        data: 'query=' + query_adress,
        url: URL + 'ajax/search-adress',
        dataType: 'json',
        success: function (json_data) {
          doWorkAdress(json_data);
        },

      });
    }
  });
}
