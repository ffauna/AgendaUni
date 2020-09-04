
 <link rel="stylesheet" type="text/css" href="css/estilos.css" />
<script>
function toggle(e) {
 if( document.getElementById("crear_evento").style.display=='none' ){
   document.getElementById("crear_evento").style.display = '';
 }else{
   document.getElementById("crear_evento").style.display = 'none';
 }
}
</script>

	


  <div class="calendario" id="semanal" >
                <table id="semana">
                    <tr>
                        <th class="GTM"></th>
						<th class="Cabecera"> LUN </th>
						<th class="Cabecera"> MAR </th>
						<th class="Cabecera"> MIE </th>
						<th class="Cabecera"> JUE </th>
						<th class="Cabecera"> VIE </th>
						<th class="Cabecera"> SAB </th>
						<th class="Cabecera"> DOM </th>
                    </tr>
                  
                            <tr>


                                <td  class="td1">0:00  </td>
                                <td onclick=toggle(); class="horas" id="Lunes00 "></td>
								<td onclick=toggle(); class="horas"  id="Martes00"></td>
								<td onclick=toggle(); class="horas" id="Miercoles00"></td>
								<td onclick=toggle(); class="horas" id="Jueves00"></td>
								<td onclick=toggle(); class="horas"  id="Viernes00"></td>
								<td onclick=toggle(); class="horas" id="Sabado00"></td>
								<td onclick=toggle(); class="horas"  id="Domingo00"></td>

                            </tr>

                            <tr onclick=toggle(); >
                                <td class="td1">1:00  </td>
                                <td class="horas" id="Lunes01"></td>
								<td class="horas"  id="Martes01"></td>
								<td class="horas" id="Miercoles01"></td>
								<td class="horas" id="Jueves01"></td>
								<td class="horas"  id="Viernes01"></td>
								<td class="horas" id="Sabado01"></td>
								<td class="horas"  id="Domingo01"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">2:00 </td>
                                 <td class="horas" id="Lunes02"></td>
								<td class="horas"  id="Martes02"></td>
								<td class="horas" id="Miercoles02"></td>
								<td class="horas" id="Jueves02"></td>
								<td class="horas"  id="Viernes02"></td>
								<td class="horas" id="Sabado02"></td>
								<td class="horas"  id="Domingo02"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">3:00 </td>
                                <td class="horas" id="Lunes03"></td>
								<td class="horas"  id="Martes03"></td>
								<td class="horas" id="Miercoles03"></td>
								<td class="horas" id="Jueves03"></td>
								<td class="horas"  id="Viernes03"></td>
								<td class="horas" id="Sabado03"></td>
								<td class="horas"  id="Domingo03"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">4:00 </td>
                                <td class="horas" id="Lunes04"></td>
								<td class="horas"  id="Martes04"></td>
								<td class="horas" id="Miercoles04"></td>
								<td class="horas" id="Jueves04"></td>
								<td class="horas"  id="Viernes04"></td>
								<td class="horas" id="Sabado04"></td>
								<td class="horas"  id="Domingo04"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">5:00 </td>
                                <td class="horas" id="Lunes05"></td>
								<td class="horas"  id="Martes05"></td>
								<td class="horas" id="Miercoles05"></td>
								<td class="horas" id="Jueves05"></td>
								<td class="horas"  id="Viernes05"></td>
								<td class="horas" id="Sabado05"></td>
								<td class="horas"  id="Domingo05"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">6:00 </td>
                                 <td class="horas" id="Lunes06"></td>
								<td class="horas"  id="Martes06"></td>
								<td class="horas" id="Miercoles06"></td>
								<td class="horas" id="Jueves06"></td>
								<td class="horas"  id="Viernes06"></td>
								<td class="horas" id="Sabado06"></td>
								<td class="horas"  id="Domingo06"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">7:00 </td>
                                 <td class="horas" id="Lunes07"></td>
								<td class="horas"  id="Martes07"></td>
								<td class="horas" id="Miercoles07"></td>
								<td class="horas" id="Jueves07"></td>
								<td class="horas"  id="Viernes07"></td>
								<td class="horas" id="Sabado07"></td>
								<td class="horas"  id="Domingo07"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">8:00 </td>
                                 <td class="horas" id="Lunes08"></td>
								<td class="horas"  id="Martes08"></td>
								<td class="horas" id="Miercoles08"></td>
								<td class="horas" id="Jueves08"></td>
								<td class="horas"  id="Viernes08"></td>
								<td class="horas" id="Sabado08"></td>
								<td class="horas"  id="Domingo08"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">9:00 </td>
                                 <td class="horas" id="Lunes09"></td>
								<td class="horas"  id="Martes09"></td>
								<td class="horas" id="Miercoles09"></td>
								<td class="horas" id="Jueves09"></td>
								<td class="horas"  id="Viernes09"></td>
								<td class="horas" id="Sabado09"></td>
								<td class="horas"  id="Domingo09"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">10:00 </td>
                                 <td class="horas" id="Lunes10"></td>
								<td class="horas"  id="Martes10"></td>
								<td class="horas" id="Miercoles10"></td>
								<td class="horas" id="Jueves10"></td>
								<td class="horas"  id="Viernes10"></td>
								<td class="horas" id="Sabado10"></td>
								<td class="horas"  id="Domingo10"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">11:00 </td>
                                 <td class="horas" id="Lunes11"></td>
								<td class="horas"  id="Martes11"></td>
								<td class="horas" id="Miercoles11"></td>
								<td class="horas" id="Jueves11"></td>
								<td class="horas"  id="Viernes11"></td>
								<td class="horas" id="Sabado11"></td>
								<td class="horas"  id="Domingo11"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">12:00 </td>
                                <td class="horas" id="Lunes12"></td>
								<td class="horas"  id="Martes12"></td>
								<td class="horas" id="Miercoles12"></td>
								<td class="horas" id="Jueves12"></td>
								<td class="horas"  id="Viernes12"></td>
								<td class="horas" id="Sabado12"></td>
								<td class="horas"  id="Domingo12"></td>
                            </tr>
                    
                            <tr onclick=toggle(); >
                                <td class="td1">13:00 </td>
                                <td class="horas" id="Lunes13"></td>
								<td class="horas"  id="Martes13"></td>
								<td class="horas" id="Miercoles13"></td>
								<td class="horas" id="Jueves13"></td>
								<td class="horas"  id="Viernes13"></td>
								<td class="horas" id="Sabado13"></td>
								<td class="horas"  id="Domingo13"></td>
                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">14:00 </td>
                                 <td class="horas" id="Lunes14"></td>
								<td class="horas"  id="Martes14"></td>
								<td class="horas" id="Miercoles14"></td>
								<td class="horas" id="Jueves14"></td>
								<td class="horas"  id="Viernes14"></td>
								<td class="horas" id="Sabado14"></td>
								<td class="horas"  id="Domingo14"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">15:00 </td>
                                 <td class="horas" id="Lunes15"></td>
								<td class="horas"  id="Martes15"></td>
								<td class="horas" id="Miercoles15"></td>
								<td class="horas" id="Jueves15"></td>
								<td class="horas"  id="Viernes15"></td>
								<td class="horas" id="Sabado15"></td>
								<td class="horas"  id="Domingo15"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">16:00 </td>
                                 <td class="horas" id="Lunes16"></td>
								<td class="horas"  id="Martes16"></td>
								<td class="horas" id="Miercoles16"></td>
								<td class="horas" id="Jueves16"></td>
								<td class="horas"  id="Viernes16"></td>
								<td class="horas" id="Sabado16"></td>
								<td class="horas"  id="Domingo16"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">17:00 </td>
                                <td class="horas" id="Lunes17"></td>
								<td class="horas"  id="Martes17"></td>
								<td class="horas" id="Miercoles17"></td>
								<td class="horas" id="Jueves17"></td>
								<td class="horas"  id="Viernes17"></td>
								<td class="horas" id="Sabado17"></td>
								<td class="horas"  id="Domingo17"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">18:00 </td>
                                 <td class="horas" id="Lunes18"></td>
								<td class="horas"  id="Martes18"></td>
								<td class="horas" id="Miercoles18"></td>
								<td class="horas" id="Jueves18"></td>
								<td class="horas"  id="Viernes18"></td>
								<td class="horas" id="Sabado18"></td>
								<td class="horas"  id="Domingo18"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">19:00 </td>
                               <td class="horas" id="Lunes19"></td>
								<td class="horas"  id="Martes19"></td>
								<td class="horas" id="Miercoles19"></td>
								<td class="horas" id="Jueves19"></td>
								<td class="horas"  id="Viernes19"></td>
								<td class="horas" id="Sabado19"></td>
								<td class="horas"  id="Domingo19"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">20:00 </td>
                                 <td class="horas" id="Lunes20"></td>
								<td class="horas"  id="Martes20"></td>
								<td class="horas" id="Miercoles20"></td>
								<td class="horas" id="Jueves20"></td>
								<td class="horas"  id="Viernes20"></td>
								<td class="horas" id="Sabado20"></td>
								<td class="horas"  id="Domingo20"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">21:00 </td>
                               <td class="horas" id="Lunes21"></td>
								<td class="horas"  id="Martes21"></td>
								<td class="horas" id="Miercoles21"></td>
								<td class="horas" id="Jueves21"></td>
								<td class="horas"  id="Viernes21"></td>
								<td class="horas" id="Sabado21"></td>
								<td class="horas"  id="Domingo21"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">22:00 </td>
                               <td class="horas" id="Lunes22"></td>
								<td class="horas"  id="Martes22"></td>
								<td class="horas" id="Miercoles22"></td>
								<td class="horas" id="Jueves22"></td>
								<td class="horas"  id="Viernes22"></td>
								<td class="horas" id="Sabado22"></td>
								<td class="horas"  id="Domingo22"></td>


                            </tr>
                            <tr onclick=toggle(); >
                                <td class="td1">23:00 </td>
                                 <td class="horas" id="Lunes23"></td>
								<td class="horas"  id="Martes23"></td>
								<td class="horas" id="Miercoles23"></td>
								<td class="horas" id="Jueves23"></td>
								<td class="horas"  id="Viernes23"></td>
								<td class="horas" id="Sabado23"></td>
								<td class="horas"  id="Domingo23"></td>

                            </tr>

                        </table>

		</div>
</div>

