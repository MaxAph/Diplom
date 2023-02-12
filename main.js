const domBtnAddFilm = document.getElementById('btnAddFilm');
const domBtnClose = document.getElementById('btnClose');
const domInputFilm = document.getElementById('filmName');
const domInputDirector = document.getElementById('director');
const domInputCountry = document.getElementById('country');
const domInputStudia = document.getElementById('studia');
const domInputDtRelease = document.getElementById('dt');
const domInputDuration = document.getElementById('duration');
const domInputGenre = document.getElementById('genre');
const domInputFullDesc = document.getElementById('full_desk');
const popup = document.getElementById('popup');
const render = document.getElementById('render');

domBtnAddFilm.addEventListener('click', onBtnAddFilm);
domBtnClose.addEventListener('click', onBtnClose);

function onBtnAddFilm() {
	popup.style.display = 'block';
	render.style.display = 'none';
}

function onBtnClose() {
	popup.style.display = 'none';
	render.style.display = 'block';
}
