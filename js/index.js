const btnCalendario = document.getElementById("crear-calendario");
const formCalendario = document.getElementById("form-calendario");
const plantCalendario = document.getElementById("plantilla-calendario");
const btnEvento = document.getElementById("crear-evento");
const formEvento = document.getElementById("form-evento")

btnCalendario.addEventListener("click", event => {
	formCalendario.classList.toggle("oculto");
});

btnEvento.addEventListener("click", event => {
	formEvento.classList.toggle("oculto");
});

