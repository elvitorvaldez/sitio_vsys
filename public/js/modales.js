$(document).ready(function(){
 //parametros principales
 var contenidoHTML = '';

 
 
 
 var ancho = 600; 
 var alto = 250;

 $('.mod').click(function(){

var ID = $(this).attr("id");


if (ID=="buttonCUAD")
{
 var contenidoHTML = '<p>Es un servicio que facilita la comunicaci&oacute;n de tu empresa permiti&eacute;ndote trabajar de manera eficiente, adem&aacute;s de mejorar y modernizar las funcionalidades de tu sistema de telefon&iacute;a..<br><br><strong>Beneficios</strong><br><br><ul>    <li>Comunicaci&oacute;n m&aacute;s eficiente en la empresa.</li>  <li>Disponibilidad en todo momento desde cualquier dispositivo*.</li>     <li>Elimina la inversi&oacute;n en equipamiento, contrataci&oacute;n e instalaci&oacute;n as&iacute; como gastos de soporte y amntenimeinto por tratarse de un servicio en la nube.</li>     <li>Te permite permanecer a la vanguardia ya que incluye actualizaciones y funcionalidades adicionales de acuerdo a las nuevas tendencias tecnol&oacute;gicas.</li>     <li>No es necesario contar con elementos adicionales o diferentes proveedores ya que se trata de una soluci&oacute;n integral.</li> </ul><br><br> El servicio incluye: <br><br><ul>    <li>Apoyo remoto en la implementaci&oacute;n.</li>  <li>Soporte t&eacute;cnico.</li>     <li>Monitoreo.</li>     <li>Mantenimiento.</li> <br><br> *Actualizaciones *Servicio Premium, consulte las Modalidades. </p><button onclick=\"closeModal()\">Cerrar</button>';
}

if (ID=="buttonCLOUD")
{
var contenidoHTML = '<p> Un servicio administrado que integra funcionalidades PBX y comunicaciones unificadas (movilidad, video, mensajer&iacute;a instant&aacute;nea y unificada), que te permiten recibir la misma experiencia de comunicaci&oacute;nsin importar el dispositivo utilizado ni el medio de acceso.<br><br>Ideal para clientes empresariales que tienen sucursales dispersas o aquellos que necesitan renovar su infraestructura de voz, agregando herramientas de productividad.<br><br><strong>Beneficios</strong><br><br><ul>    <li>Disposici&oacute;n de un modelo comercial sin inversiones iniciales.</li>  <li>Servicios basados en tecnolog&iacute;a de punta con nuestro aliado Cisco.</li>     <li>Arquitectura centralizada, segura y con alta disponibilidad instalada en el Centro de Datos Triara.</li>     <li>Reducci&oacute;n del tiempo de implementaci&oacute;n.</li>     <li>Colaboraci&oacute;n, movilidad, presencia y adopci&oacute;n tecnol&oacute;gica desde la nube.</li> </ul><br><br> <strong>Caracter&iacute;sticas</strong><br><br> Pagos mensuales por funcionalidades o componentes, que te permiten pagar conforme vaya creciendo el alcance del servicio.</p><button onclick=\"closeModal()\">Cerrar</button>';
}


if (ID=="buttonVIDEO")
{
var contenidoHTML = '<p>Las Salas P&uacute;blicas de Video y Telepresencia de TELMEX IT, permiten a cualquier empresa sin importar su tama&ntilde;o, reunir a equipos de trabajo, clientes y proveedores, situados en diferentes lugares de la rep&uacute;blica mexicana para colaborar entre ellos, reduciendo considerablemente costos de vi&aacute;ticos y aumentando la productividad.<br><br>Las salas est&aacute;n equipadas para tener sesiones de Video y Telepresencia, brindando comunicaci&oacute;n de audio, v&iacute;deo y datos entre dos o m&aacute;s salas.</p><button onclick=\"closeModal()\">Cerrar</button>';
}


if (ID=="buttonAUDIO")
{
var contenidoHTML = '<p>Las Salas P&uacute;blicas de Video y Telepresencia de TELMEX IT, permiten a cualquier empresa sin importar su tama&ntilde;o, reunir a equipos de trabajo, clientes y proveedores, situados en diferentes lugares de la rep&uacute;blica mexicana para colaborar entre ellos, reduciendo considerablemente costos de vi&aacute;ticos y aumentando la productividad.<br><br>Las salas est&aacute;n equipadas para tener sesiones de Video y Telepresencia, brindando comunicaci&oacute;n de audio, v&iacute;deo y datos entre dos o m&aacute;s salas.</p><button onclick=\"closeModal()\">Cerrar</button>';
}




 // fondo transparente
 // creamos un div nuevo, con dos atributos
 var bgdiv = $('<div>').attr({
 className: 'bgtransparent',
 id: 'bgtransparent'
 });
 
 // agregamos nuevo div a la pagina
 $('body').append(bgdiv);
 
 // obtenemos ancho y alto de la ventana del explorer
 var wscr = $(window).width();
 var hscr = $(window).height();
 
 //establecemos las dimensiones del fondo
 $('#bgtransparent').css("width", wscr);
 $('#bgtransparent').css("height", hscr);
 
 
 // ventana modal
 // creamos otro div para la ventana modal y dos atributos
 var moddiv = $('<div>').attr({
 className: 'bgmodal',
 id: 'bgmodal'
 }); 
 
 // agregamos div a la pagina
 $('body').append(moddiv);

 // agregamos contenido HTML a la ventana modal
 $('#bgmodal').append(contenidoHTML);
 
 // redimensionamos para que se ajuste al centro y mas
 $(window).resize();
 });

 $(window).resize(function(){
 // dimensiones de la ventana del explorer 
 var wscr = $(window).width();
 var hscr = $(window).height();

 // estableciendo dimensiones de fondo
 $('#bgtransparent').css("width", wscr);
 $('#bgtransparent').css("height", hscr);
 
 // estableciendo tama&ntilde;o de la ventana modal
 $('#bgmodal').css("width", ancho+'px');
 $('#bgmodal').css("height", alto+'px');
 
 // obtiendo tama&ntilde;o de la ventana modal
 var wcnt = $('#bgmodal').width();
 var hcnt = $('#bgmodal').height();
 
 // obtener posicion central
 var mleft = ( wscr - wcnt ) / 2;
 var mtop = ( hscr - hcnt ) / 2;
 
 // estableciendo ventana modal en el centro
 $('#bgmodal').css("left", mleft+'px');
 $('#bgmodal').css("top", mtop+'px');
 });
 
 });
 
function closeModal(){
 // removemos divs creados
 $('#bgmodal').remove();
 $('#bgtransparent').remove();
}
