


<!DOCTYPE html>
<html>
 <head>
  <title>Agenda Universitaria</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script>
   
  $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
    editable:true,
	firstDay:[1],
	 header:{
     left:'prev,next ',
     center:'title',
     right:'month,agendaWeek'
    },
	events:'load.php',
	dayNamesShort: ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'],
	monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
	monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
	selectable:true,
	selectHelper:true,
	allDaySlot: false,


	select: function(start, end, allDay){
     var nombre = prompt("Dale un nombre:");
	 var latitud = prompt("Dale una latitud:");
	 var longitud = prompt("Dale una longitud:");
	 var tipoevento = prompt("Tipo de evento:");
	 var diacompleto = prompt("Dia completo?(SI/NO):");
	 var descripcion = prompt("Descripcion:");
	 
	
	



     if(nombre!="")
     {
	   event.title=nombre;
       var fechainicio = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
       var fechafin = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      
	   start=fechainicio;
	   end=fechafin;
	  



	 /* $.ajax({
       url:"nuevoevento.php",
       type:"POST",
       data:{nombre:nombre, latitud:latitud, longitud:longitud,
	   fechainicio:fechainicio,fechafin:fechafin,tipoevento:tipoevento,diacompleto:diacompleto,descripcion:descripcion},
       success:function()
       {
        calendar.fullCalendar('refetchEvents');
        alert("Evento creado satisfactoriamente ");
       }
      })
	  */
     }
    },

	editable:true,
	eventResize:function(event){
		var fechainicio = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		var fechafin = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

		var nombre = event.title;
	

		$.ajax({
			url:"modifica_evento.php",
			type:"POST",
			 data:{nombre:nombre, fechainicio:fechainicio, fechafin:fechafin},
			 success:function(){
				calendar.fullcalendar('refetchEvents');
				alert('Evento Modificado');
			 }
			
			
		})
	},

	eventDrop:function(event){
		var fechainicio = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		var fechafin = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
		var nombre = event.title;
		

		$.ajax({
			url:"modifica_evento.php",
			type:"POST",
			 data:{nombre:nombre, fechainicio:fechainicio, fechafin:fechafin},
			 success:function(){
				calendar.fullcalendar('refetchEvents');
				alert('Evento Modificado');
			 }
			
			
		});
	},

	eventClick:function(event){
		if(confirm("¿Estas seguro de que quieres borrar el evento?")){
			
		var fechainicio = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		var fechafin = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
		var nombre = event.title;
		

			$.ajax({
			url:"EliminarEvento.php",
			type:"POST",
			 data:{fechainicio:fechainicio,fechafin:fechafin,nombre:nombre},
			 success:function(){
				calendar.fullcalendar('refetchEvents');
				alert('Evento Eliminado');
			 }
			
			
		})
		}
	},


	

    });
  });
   
  </script>
 </head>
 <body>
  <br />
  <h2 align="center"><a href="#">Agenda Universitaria</a></h2>
  <br />
  <div class="container">
   <div id="calendar"></div>
  </div>
 </body>
</html>
