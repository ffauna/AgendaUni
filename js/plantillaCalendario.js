var fecha = document.getElementById("plantilla_calendario").getAttribute('data-value').split("-");
var mes = parseInt(fecha[0], 10);
var anyo = parseInt(fecha[1], 10);
var nombreMes = getNombreMes(mes-1);
var listaEventos = [];
creaPlantilla(anyo, mes);

function creaPlantilla(anyo, mes){
	var plantilla = document.getElementById("plantilla_calendario");
	var plantillaDias = document.getElementById("diasCalendario");
	var dias = getDiaPorMesyAnyo(mes, anyo);
	var primerDiaMes = new Date(anyo, mes);
	var hoy = new Date();

	plantilla.insertAdjacentHTML("afterbegin", "<h2 class='tituloPlantilla'>" + getNombreMes(mes) + " del " + anyo + "</h2>");

	for (let i = 0; i < dias; i++) {
		plantillaDias.insertAdjacentHTML("beforeend", "<div id='diaPlantilla' data-value=" +(i+1) + ">"+ (i+1) + "</div>");
	}
}	

function esBisiesto(anyo){
	return ((anyo % 4 === 0 && anyo % 100 !== 0) || anyo % 400 === 0); 
}

function getDiaPorMesyAnyo(mes, anyo){
	return [31, (esBisiesto(anyo) ? 29 : 28), 31, 30, 31, 30, 31, 31, 30, 31, 30, 31][mes-1];
}

function getNombreMes(numMes){
	return ["Enero", "Febrero", "Marzo", "Abril", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"][0];
}