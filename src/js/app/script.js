var startButton         = document.querySelector('#start');
var start               = document.querySelector('.start');
var eventName           = document.querySelector('.eventName');
var eventNameButton     = document.querySelector('#eventName');
var dateAndHours        = document.querySelector('.dateAndHours');
var dateAndHoursButton  = document.querySelector('#dateAndHours');
var places              = document.querySelector('.places');
var placeButton         = document.querySelector('#places');
var properties         = document.querySelector('.properties');
var propertiesButton         = document.querySelector('#properties');
var films         = document.querySelector('.films');
var filmsButton         = document.querySelector('#films');

startButton.addEventListener('click', function () {
  start.style.display = 'none';
  eventName.style.display = 'block';
});

eventNameButton.addEventListener('click', function () {
  eventName.style.display = 'none';
  dateAndHours.style.display = 'block';
});

dateAndHoursButton.addEventListener('click', function () {
  dateAndHours.style.display = 'none';
  places.style.display = 'block';
});

placeButton.addEventListener('click', function () {
  places.style.display = 'none';
  properties.style.display = 'block';
});

propertiesButton.addEventListener('click', function () {
  properties.style.display = 'none';
  films.style.display = 'block';
});