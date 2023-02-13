const domBtnAddFilm = document.getElementById('btnAddFilm');
const domBtnClose = document.getElementById('btnClose');
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
