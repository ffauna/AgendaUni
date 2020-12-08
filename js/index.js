const btnCalendario = document.getElementById("crear-calendario");
const formCalendario = document.getElementById("form-calendario");
<<<<<<< HEAD

btnCalendario.addEventListener("click", event => {
	formCalendario.classList.toggle("oculto");
});
=======
const plantCalendario = document.getElementById("plantilla-calendario");
const btnEvento = document.getElementById("crear-evento");
const formEvento = document.getElementById("form-evento")

btnCalendario.addEventListener("click", event => {
	formCalendario.classList.toggle("oculto");
});

btnEvento.addEventListener("click", event => {
	formEvento.classList.toggle("oculto");
});

>>>>>>> e96abc943d38401eab20593252eb516df208cd24
