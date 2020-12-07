const btnCalendario = document.getElementById("crear-calendario");
const formCalendario = document.getElementById("form-calendario");
const plantCalendario = document.getElementById("plantilla-calendario");

btnCalendario.addEventListener("click", event => {
	formCalendario.classList.toggle("oculto");
});

