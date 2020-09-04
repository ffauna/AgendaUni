    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
   

        $(document).ready(function() {
   var calendar = $('#calendar').fullCalendar({
            editable: true,
        firstDay:[1],
	 header:{
            left: 'prev,next ',
        center:'title',
        right:'month,agendaWeek'
       },
       events:'gestionEvento.php',
       dayNamesShort: ['DOM', 'LUN', 'MAR', 'MIE', 'JUE', 'VIE', 'SAB'],
       monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
       monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
       selectable:true,
       selectHelper:true,
   
   
       select: function(horainicio, horafin, allDay)
    {
     var nombre = prompt("Dale un nombre:");
        var latitud = prompt("Dale una latitud:");
        var nombre = prompt("Dale un nombre:");
        if(title)
     {
      var horainicio = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
        var horafin = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
      $.ajax({
            url: "gestionEvento.php",
        type:"POST",
       data:{nombre: title, horainicio:start, horafin:end},
        success:function()
       {
            calendar.fullCalendar('refetchEvents');
        alert("Added Successfully");
       }
      })
     }
    },

	editable:true,
	eventResize:function(event){
		var horainicio = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		var horafin = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

		var nombre = event.title;
		var id = event.id;

		$.ajax({
            url: "gestionEvento.php",
        type:"POST",
			 data:{nombre: title, horainicio:start, horafin:end},
			 success:function(){
            calendar.fullcalendar('refetchEvents');
        alert('Evento Modificado');
     }


})
},

	eventDrop:function(event){
		var horainicio = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
		var horafin = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");

		var nombre = event.title;
		var id = event.id;

		$.ajax({
            url: "gestionEvento.php",
        type:"POST",
			 data:{nombre: title, horainicio:start, horafin:end},
			 success:function(){
            calendar.fullcalendar('refetchEvents');
        alert('Evento Modificado');
     }


});
},

	eventClick:function(event){
		if(confirm("¿Estás seguro de que quieres borrar el evento?")){
			
			var id = event.id;

			$.ajax({
            url: "gestionEvento.php",
        type:"POST",
			 data:{id: id},
			 success:function(){
            calendar.fullcalendar('refetchEvents');
        alert('Evento Eliminado');
     }


})
}
},




});
});

  