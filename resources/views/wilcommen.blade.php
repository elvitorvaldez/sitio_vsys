<!DOCTYPE html>
<html lang="en">
   <head>
      <!--
         New Event
         http://www.templatemo.com/tm-486-new-event
         -->
      <title>Vsys</title>
      <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
      <meta name="description" content="">
      <meta name="author" content="">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=Edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/font-awesome.min.css">
      <link rel="stylesheet" href="css/owl.theme.css">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <!--<link rel="stylesheet" href="css/jquery.css">-->
      <!-- Main css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Google Font -->
      <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="js/jquery.js"></script>
      <script languaje="javascript">
      
      
        function limpiaCvForm()
         {
        $("#firstname").val("");
         $("#lastname").val("");
         $("#curp").val("");
         $("#address").val("");
         $("#phone1").val("");
         $("#phone2").val("");
         $("#email").val(""); 
    }
        
      function tipoTrabajo(tipo)
      {
       limpiaCvForm(); 
       if (tipo===1)
       {
            $("#vacantes").show(500);
            $("#becarios").hide(500);
       }
       if (tipo===2)
       {
            $("#vacantes").hide(500);
            $("#becarios").show(500);
       }
       
       $("#idTipoVacante").val("");   
       $("#idTipoVacante").val(tipo); 
      }
          
  
    
    
    function llenaVacante(puesto, idPuesto) {
      limpiaCvForm();  
     $("#register").show();
     $("#puesto").show();
     $("#puesto").html("");
     $("#vacante").val(puesto);
     $("#idPuesto").val(idPuesto);
     $("#puesto").html("Postúlate para el puesto de " + puesto);
 }   
          
          
        function mostrareldiv(id) {
     //alert(id);
     document.getElementById(id).style.display = "block"; // permite asignar display:block al elemento #modal
 }


 function ocultareldiv(id) {
     document.getElementById(id).style.display = "none"; // permite ocultar el contenedor al hacer clic en alguna parte de éste mediante display:none en el elemento #modal
 }




 $(document).ready(function() {

 $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });


 


     $("#uploadCv").submit(function(event) {
         
         event.preventDefault();
                
        $("#loading").show();
         $("#submitCv").hide();
         var f = $(this);
         var formData = new FormData(document.getElementById("uploadCv"));
         $.ajax({
                 url: "{{ url('sendCv') }}",
                 type: "post",
                 dataType: "json",
                 data: formData,
                 cache: false,
                 contentType: false,
                 processData: false
             })
             .done(function(res) {
                 //$("#mensaje").html("Respuesta: " + res);

                 if (res.success === false) {
                     $("#loading").hide();
                     $("#submitCv").show();
                     $("#cvError").html('<strong>' + res.mensaje + '</strong>');
                     $("#cvError").show(1000);

                     setTimeout(function() {
                         $("#cvError").fadeOut(1500);
                     }, 3000);
                 } else {
                     $("#loading").hide();
                     $("#submitCv").show();
                     $("#cvSuccess").html('<strong>Su postulación ha sido cargada correctamente</strong>');
                     $("#cvSuccess").show(1000);

                     setTimeout(function() {
                         $("#cvSuccess").fadeOut(1500);
                         $("#register").fadeOut(1500);
                         
                     document.location.href = "#intro";
                     }, 3000);
                     
                 }

             });

     });




    

     $("#loginButton").click(function() {
         $.ajax({
             method: 'POST',
             url: "{{ url('login') }}",
             data: {
                 username: $("#username").val(),
                 password: $("#password").val()
             }
         }).done(function(data) {
             if (data.success) {
                 window.location = "{{ url('dashboard') }}";
             } else {

                 $("#loginError").html('<strong>' + data.mensaje + '</strong>');
                 $("#loginError").show(1000);
                 setTimeout(function() {
                     $("#loginError").fadeOut(1500);
                 }, 3000);
             }
         });



     });


 });
         
      </script>
   </head>
   <body data-spy="scroll" data-offset="50" data-target=".navbar-collapse">
      <!-- =========================
         PRE LOADER       
         ============================== -->
      <div class="preloader">
         <div class="sk-rotating-plane"></div>
      </div>
      <!-- =========================
         NAVIGATION LINKS     
         ============================== -->
      <div class="navbar navbar-fixed-top custom-navbar" role="navigation">
         <div class="container">
            <!-- navbar header -->
            <div class="navbar-header">
               <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon icon-bar"></span>
               <span class="icon icon-bar"></span>
               <span class="icon icon-bar"></span>
               </button>
               <a href="#" class="navbar-brand"><img src="images/vsys_blanco.png" id="logo"></a>
            </div>
            <div class="collapse navbar-collapse">
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="#intro" class="smoothScroll">Inicio</a></li>
                  <li><a href="#quienes" class="smoothScroll">Nosotros</a></li>
                  <li><a href="#services" class="smoothScroll">Servicios</a></li>
                  <li><a href="#speakers" class="smoothScroll">Vacantes</a></li>
                  <!--				<li><a href="#register" class="smoothScroll">Envía tu CV</a></li>-->
                  <li><a href="#contacto" class="smoothScroll">Ubicación</a></li>
                  <!--				<li><a href="#sponsors" class="smoothScroll">Sponsors</a></li>-->
                  <li><a href="#contact" class="smoothScroll">Login</a></li>
               </ul>
            </div>
         </div>
      </div>
      <!-- =========================
         INTRO SECTION   
         ============================== -->
      <section id="intro" class="parallax-section">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12" id="principalCol">
                  <!--<h1 class="wow bounceIn" data-wow-delay="0.9s">VSYS</h1>-->
                  <img src="images/vsys_blanco.png" alt="vsys" style="width: 50%">
                  <h4 class="wow fadeInUp" data-wow-delay="1.6s">Comunicaciones Unificadas Administradas.</h4>
                  <h4 class="wow fadeInUp" data-wow-delay="1.6s">Video, Voz, Mensajería Instantánea y Colaboración.</h4>
                
                      <a href="#quienes" id="quienesLnk" class="btn btn-lg btn-default smoothScroll wow fadeInUp" data-wow-delay="2.3s">Quienes somos</a>
                      <!--<a href="#servicios" class="btn btn-lg btn-danger smoothScroll wow fadeInUp" data-wow-delay="2.3s">Servicios</a>-->
                
               </div>
            </div>
         </div>
      </section>
      <!-- =========================
         HISTORY SECTION   
         ============================== -->
      <!--<section id="history" class="parallax-section">
         <div class="container">
         	<div class="row">
                            <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
         			<h1>HISTORIA</h1>
         			<h3>Surge en Silicon Valley como una empresa de virtualización.</h3>
         			<h3>Nace como proveedor de servicios de comunicaciones unificadas en la nube.</h3>
         		</div>
                                <div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.6s">
         			<img src="images/history-img.jpg" class="img-responsive" alt="Overview">
         		</div>
         		
         				
         		
         
         	</div>
         </div>
         </section>-->
      <!-- =========================
         QUIENES SOMOS SECTION   
         ============================== -->
      <section id="quienes" class="parallax-section">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12" style="text-align: center" data-wow-delay="1.6s">
                  <h1 class="wow fadeInUp" style="color:#333" data-wow-delay="0.6s">¿QUIENES SOMOS?</h1>
                  <br>
                  <h3 class="wow fadeInUp" data-wow-delay="0.5s">Vsys es una empresa 100% mexicana dedicada a la integración de comunicaciones unificadas.</h3>
                  <h3 class="wow fadeInUp" data-wow-delay="0.9s">Somos parte del consorcio "Red Uno" brindando servicios a telecomunicaciones que a su vez pertenece a grupo Carso.</h3>
                  
               </div>
               <!--			<div class="wow fadeInUp col-md-6 col-sm-6" data-wow-delay="0.9s">
                  <img src="images/history-img.jpg" class="img-responsive" alt="Overview">
                  </div>-->
            </div>
         </div>
      </section>
      <!--
         =========================
            DETAIL SECTION   
         ============================== 
         <section id="detail" class="parallax-section">
         <div class="container">
         	<div class="row">
         
         		<div class="wow fadeInLeft col-md-4 col-sm-4" data-wow-delay="0.3s">
         			<i class="fa fa-group"></i>
         			<h3>650 Participants</h3>
         			<p>Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa. Sed tincidunt metus sed eleifend suscipit.</p>
         		</div>
         
         		<div class="wow fadeInUp col-md-4 col-sm-4" data-wow-delay="0.6s">
         			<i class="fa fa-clock-o"></i>
         			<h3>24 Programs</h3>
         			<p>Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa. Sed tincidunt metus sed eleifend suscipit.</p>
         		</div>
         
         		<div class="wow fadeInRight col-md-4 col-sm-4" data-wow-delay="0.9s">
         			<i class="fa fa-microphone"></i>
         			<h3>11 Speakers</h3>
         			<p>Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa. Sed tincidunt metus sed eleifend suscipit.</p>
         		</div>
         
         	</div>
         </div>
         </section>-->
      <!-- =========================
         VISION SECTION   
         ============================== -->
      <section id="enterprise" class="parallax-section">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <h2 class="section-heading">VSYS</h2>
                  <h3 class="section-subheading text-muted">En Vsys le ayudamos a desencadenar los beneficios de la tecnología.</h3>
               </div>
            </div>
            <div class="row text-center">
               <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-globe fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Misión</h4>
                  <p class="text-muted">Ser líder en el desarrollo, implementación y operación de servicios de comunicaciones unificadas, generando
                     soluciones integrales e innovadoras de clase mundial a los usuarios, a través del desarrollo humano
                     y de la aplicación y administración de tecnologías de punta, con la más alta calidad de servicio
                     y experiencia de usuario.
                  </p>
               </div>
               <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-eye fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Visión</h4>
                  <p class="text-muted">Lograr el posicionamiento de VSYS como líder en servicios de comunicaciones unificadas, permitiéndonos
                     expandirlos a nivel internacional como una empresa de primera necesidad, altamente competitiva, confiable,
                     con el mejor crecimiento y ofreciendo sus servicios con los mayores estándares de calidad a nivel
                     mundial.
                  </p>
               </div>
               <div class="col-md-4">
                  <span class="fa-stack fa-4x">
                  <i class="fa fa-circle fa-stack-2x text-primary"></i>
                  <i class="fa fa-check fa-stack-1x fa-inverse"></i>
                  </span>
                  <h4 class="service-heading">Valores</h4>
                  <p class="text-muted">Cultura del conocimiento.</p>
                  <p class="text-muted">Trabajo colaborativo.</p>
                  <p class="text-muted">Integridad.</p>
                  <p class="text-muted">Compromiso.</p>
                  <p class="text-muted">Enfoque en el cliente.</p>
               </div>
            </div>
         </div>
      </section>
      <!-- =========================
         VISION SECTION   
         ============================== -->
      <section id="services" class="parallax-section">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12" data-wow-delay="0.9s">
                   
                   <!--Seccion de modales-->
                   
                  <div id="modalCUAD" class="modales" style="display:none">
                     <div id="contenido-interno">
                        <div class="modal-header">
                           <a  class="close" onclick="ocultareldiv('modalCUAD')">×</a>
                           <h4 id="CuadTitulo">Comunicaciones unificadas administradas</h4>
                        </div>
                        <div class="modal-body">
                           <p class="p-modal">Es un servicio que facilita la comunicaci&oacute;n de tu empresa permiti&eacute;ndote trabajar de manera eficiente, adem&aacute;s de mejorar y modernizar las funcionalidades de tu sistema de telefon&iacute;a.<br>
                             Son un conjunto de tecnologías integradas que proveen a los usuarios la habilidad de comunicarse de diferentes maneras como: video, voz, voz mail, mail, texto, video-audio web conferencia usando cualquier dispositivo como teléfonos de escritorio computadoras, tabletas, Smart phone y celulares.
                               
                               <strong>Beneficios</strong><br>
                           <ul>
                              <li>Comunicaci&oacute;n m&aacute;s eficiente en la empresa.</li>
                              <li>Disponibilidad en todo momento desde cualquier dispositivo*.</li>
                              <li>Elimina la inversi&oacute;n en equipamiento, contrataci&oacute;n e instalaci&oacute;n as&iacute; como gastos de soporte y amntenimeinto por tratarse de un servicio en la nube.</li>
                              <li>Te permite permanecer a la vanguardia ya que incluye actualizaciones y funcionalidades adicionales de acuerdo a las nuevas tendencias tecnol&oacute;gicas.</li>
                              <li>No es necesario contar con elementos adicionales o diferentes proveedores ya que se trata de una soluci&oacute;n integral.</li>
                           </ul>
<!--                           <br> El servicio incluye: <br>
                           <ul>
                           <li>Apoyo remoto en la implementaci&oacute;n.</li>
                           <li>Soporte t&eacute;cnico.</li>
                           <li>Monitoreo.</li>
                           <li>Mantenimiento.</li>
                           <br> *Actualizaciones *Servicio Premium, consulte las Modalidades. </p>    -->
                        </div>
                     </div>
                  </div>
                   
                   
                     <div id="modalCLOUD" class="modales" style="display:none">
                     <div id="contenido-interno">
                        <div class="modal-header">
                           <a  class="close" onclick="ocultareldiv('modalCLOUD')">×</a>
                           <h3>Cloud PBX</h3>
                        </div>
                        <div class="modal-body">
                           <p class="p-modal">Un servicio administrado que integra funcionalidades PBX y comunicaciones unificadas (movilidad, video, mensajer&iacute;a instant&aacute;nea y unificada), que te permiten recibir la misma experiencia de comunicaci&oacute;n sin importar el dispositivo utilizado ni el medio de acceso.<br>
                               Ideal para clientes empresariales que tienen sucursales dispersas o aquellos que necesitan renovar su infraestructura de voz, agregando herramientas de productividad.<br>
                               <br> <strong>Beneficios</strong><br>
                           <ul class="p-modal">    <li>Disposici&oacute;n de un modelo comercial sin inversiones iniciales.</li>  
                               <li>Servicios basados en tecnolog&iacute;a de punta con nuestro aliado Cisco.</li>     
                               <li>Arquitectura centralizada, segura y con alta disponibilidad instalada en el Centro de Datos Triara.</li>     
                               <li>Reducci&oacute;n del tiempo de implementaci&oacute;n.</li>     
                               <li>Colaboraci&oacute;n, movilidad, presencia y adopci&oacute;n tecnol&oacute;gica desde la nube.</li> 
                           </ul>
<!--                           <br> <strong class="p-modal">Caracter&iacute;sticas</strong>
                           <br> Pagos mensuales por funcionalidades o componentes, que te permiten pagar conforme vaya creciendo el alcance del servicio.</p>    -->
                        </div>
                     </div>
                  </div>
                   
                   
                  <div id="modalVideo" class="modales" style="display:none">
                     <div id="contenido-interno">
                        <div class="modal-header">
                           <a  class="close" onclick="ocultareldiv('modalVideo')">×</a>
                           <h3>Videoconferencia</h3>
                        </div>
                        <div class="modal-body">
                           <p class="p-modal">Las Salas P&uacute;blicas de Video y Telepresencia de TELMEX IT, permiten a cualquier empresa sin importar su tama&ntilde;o, reunir a equipos de trabajo, clientes y proveedores, situados en diferentes lugares de la rep&uacute;blica mexicana para colaborar entre ellos, reduciendo considerablemente costos de vi&aacute;ticos y aumentando la productividad.<br><br>Las salas est&aacute;n equipadas para tener sesiones de Video y Telepresencia, brindando comunicaci&oacute;n de audio, v&iacute;deo y datos entre dos o m&aacute;s salas.
                               <br>   <strong>Beneficios:</strong> <br>
	<ul style="list-style-type:square">
		<li>
			Reduce costos de operación y optimiza tiempos al disminuir tus viajes de negocio.</li>
		<li>
			Mejora tu productividad sin importar la distancia.</li>
		<li>
			Fácil de usar.</li>
		<li>
			Cuenta con audio y video en alta definición.</li>
		<li>
			Durante el evento, tendrás personal de TELMEX para brindarte ayuda, en caso de tener dudas o requerir algún apoyo en especial.</li>
		<li>
			Ideal para empresas con presencia nacional, internacional o en expansión, cuyo personal tiene la necesidad de viajar frecuentemente.</li>
		<li>
			Opción de conectar dispositivos móviles a la sesión.</li>
	</ul>
<!--                           <br><strong>Tipos de conexión soportados:</strong><br><br>
	<ul style="list-style-type: square;">
		<li>
			Punto a punto; permite la intercomunicación entre dos Salas Públicas.</li>
		<li>
			Multipunto; permite la comunicación simultánea entre 3 o más Salas.</li>
	</ul>-->
                           </p>    
                        </div>
                     </div>
                  </div> 
                   
                   
                   <div id="modalAudio" class="modales" style="display:none;">
                     <div id="contenido-interno">
                        <div class="modal-header">
                           <a  class="close" onclick="ocultareldiv('modalAudio')">×</a>
                           <h3>Audioconferencia</h3>
                        </div>
                        <div class="modal-body">
                            <p class="p-modal">
                              Reúne en una misma llamada a varias personas que se encuentran ubicadas en diferentes puntos geográficos del país o el extranjero.<br />
		<strong>Beneficios</strong>
	<ul class="p-modal" style="list-style-type: square;">
		<li>Asistencia de una operadora durante tu audioconferencia.</li>
		<li>Absoluta confidencialidad en tus reuniones.</li>
		<li>Comunicación simultánea los 365 días del año.</li>
		<li>Reducción de costos operativos.</li>
		<li>Mantén el control desde donde quiera que estés.</li>
		<li>Sin equipos ni líneas adicionales.</li>
	</ul>
<!--            <strong>Modalidades</strong>
            <ul>
                <li>Audioconferencia Coordinada. En la fecha y hora reservada, una operadora del Centro de audioconferencia se comunicará con el anfitrión y el resto de los participantes para integrarlos a la llamada.</li>
                <li>Audioconferencia Directa</span>. Los participantes, a la hora y fecha reservada, marcan al número LADA 800 o número directo proporcionado al contratar el servicio. De acuerdo con la modalidad solicitada, el servicio genera los siguientes cargos para el a<span style="text-align: center;">nfitrión</span>&nbsp;y los participantes:</li>
	<div style="display:table; margin: auto; padding:1em; width:100%;">
		<div style="display: table-row;">
			<h6 style="display: table-cell; text-align: center; padding: 1em; border-right-color: #CCC; border-right-width: 1px; border-right-style: solid;border-bottom:#CCC 1px solid; border-top:#CCC 1px solid;">
				Tipo de cargo</h6>
			<h6 style="display: table-cell; text-align: center; padding: 1em; border-right-color: #CCC; border-right-width: 1px; border-right-style: solid;border-bottom:#CCC 1px solid; border-top:#CCC 1px solid;">
				Audioconferencia Coordinada</h6>
			<h6 style="display: table-cell; text-align: center; padding: 1em; border-right-color: #CCC; border-right-width: 1px; border-right-style: solid;border-bottom:#CCC 1px solid; border-top:#CCC 1px solid;">
				Audioconferencia Directa<br />
				(número 800)</h6>
			<h6 style="display: table-cell; text-align: center; padding: 1em; border-bottom:#CCC 1px solid; border-top:#CCC 1px solid;">
				Audioconferencia Directa<br />
				(número Directo)</h6>
		</div>
		<div style="display: table-row;">
			<div style="display: table-cell; text-align:center;  padding:1em; border-right:#CCC 1px solid; border-bottom:#CCC 1px solid;">
				Cargo por conexión</div>
			<div style="display: table-cell; text-align:center;  padding:1em; border-right:#CCC 1px solid; border-bottom:#CCC 1px solid;">
				Anfitrión</div>
			<div style="display: table-cell; text-align:center;  padding:1em; border-right:#CCC 1px solid; border-bottom:#CCC 1px solid;">
				Anfitrión</div>
			<div style="display: table-cell; text-align:center;  padding:1em; border-bottom:#CCC 1px solid;">
				Anfitrión</div>
		</div>
		<div style="display: table-row;">
			<div style="display: table-cell; text-align:center;  padding:1em; border-right:#CCC 1px solid; border-bottom:#CCC 1px solid;">
				Cargo por tráfico larga distancia</div>
			<div style="display: table-cell; text-align:center;  padding:1em; border-right:#CCC 1px solid; border-bottom:#CCC 1px solid;">
				Anfitrión</div>
			<div style="display: table-cell; text-align:center;  padding:1em; border-right:#CCC 1px solid; border-bottom:#CCC 1px solid;">
				Anfitrión</div>
			<div style="display: table-cell; text-align:center;  padding:1em; border-bottom:#CCC 1px solid;">
				Participante</div>
		</div>
	</div>-->
<!--<strong>Requisitos</strong>
	<ul style="list-style-type: square;">
		<li>Tener una Línea Telmex comercial para tu facturación.</li>
		<li>Reservar el servicio por lo menos con una hora de anticipación e indicar el tipo de Audioconferencia Telmex que deseas reservar, así como la fecha y hora.</li>
	</ul>-->
</div>  
                            </p>    
                        </div>
                     </div>
                  </div> 
                   
                   
                  <h2 class="wow fadeInUp" data-wow-delay="1.6s">Nuestros Servicios</h2>
                  <br>
                  <div id="servicios">
                     <center>
                        <div class="footerBox oneColumn">
                           <strong class="oneSpace footerMenuTitulo">Comunicaciones Unificadas Administradas</strong><br><br>
                           <img class="img-circle imgServicios" onclick="mostrareldiv('modalCUAD')" id="buttonCUAD" src="images/servicios-cuad.jpg">
                        </div>
                        <div class="footerBox oneColumn">
                           <strong class="oneSpace footerMenuTitulo">Cloud PBX</strong><br><br><br>
                           <img class="img-circle imgServicios2" onclick="mostrareldiv('modalCLOUD')" id="buttonCLOUD" src="images/servicios-cloud.jpg">
                        </div>
                        <div class="footerBox oneColumn">
                           <strong class="oneSpace footerMenuTitulo">Videoconferencia</strong><br><br><br>
                           <img class="img-circle imgServicios2" onclick="mostrareldiv('modalVideo')" id="buttonVIDEO"  src="images/servicios-videoconf.jpg">
                        </div>
                        <div class="footerBox oneColumn">
                           <strong class="oneSpace footerMenuTitulo">Audioconferencia</strong><br><br><br>
                           <img class="img-circle imgServicios2" onclick="mostrareldiv('modalAudio')" id="buttonAUDIO" src="images/servicios-audioconf.jpg">
                        </div>
                     </center>
                  </div>
               </div>
               <!--			<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.6s">
                  <div class="embed-responsive embed-responsive-16by9">
                  	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XDPwXQjAlB0" allowfullscreen></iframe>
                  </div>
                  </div>-->
            </div>
         </div>
      </section>
      <!-- =========================
         VIDEO SECTION   
         ============================== -->
      <!--<section id="video" class="parallax-section">
         <div class="container">
         	<div class="row">
         
         		<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.3s">
         			<h2>Watch Video</h2>
         			<h3>Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa. Sed tincidunt metus sed eleifend suscipit.</h3>
         			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet. Dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet consectetuer diam nonummy.</p>
         		</div>
         		<div class="wow fadeInUp col-md-6 col-sm-10" data-wow-delay="1.6s">
         			<div class="embed-responsive embed-responsive-16by9">
         				<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/XDPwXQjAlB0" allowfullscreen></iframe>
         			</div>
         		</div>
         
         	</div>
         </div>
         </section>-->
      <!-- =========================
         SPEAKERS SECTION   
         ============================== -->
<section id="speakers" class="parallax-section">
         <div class="container">
         	<div class="row">
         
         		<div class="col-md-12 col-sm-12 wow bounceIn" >
         			<div class="section-title">
                                    <h1>Ofertas de trabajo</h1><br><br>
                                        <div class="row">            
                       <div class="col-md-2 col-sm-2"></div>
                       <div class="col-md-1 col-sm-1"></div> 
                       <div class="col-md-2 col-sm-2" onclick="tipoTrabajo(1);" style="display: none">
                        <img src="images/briefcase.png" onclick="tipoTrabajo(1);" class="img-circle" alt="program">
                        <a href="#vacantes" class="ofertas-kind">Bolsa de trabajo</p>
                                         </div>
                      <div class="col-md-2 col-sm-2" onclick="tipoTrabajo(1);">
                        <img src="images/briefcase.png" onclick="tipoTrabajo(1);" class="img-circle imgCel" alt="program">
                        <a href="#vacantes" class="ofertas-kind">Bolsa de trabajo</p>
                                         </div>
                                         <div class="col-md-2 col-sm-2"></div>
                                         <div class="col-md-2 col-sm-2" onclick="tipoTrabajo(2);">
                        <img src="images/graduation-cap.png" onclick="tipoTrabajo(2);" class="img-circle imgCel" alt="program">
                        <a href="#becarios" class="ofertas-kind">Becarios</p>
                                         </div>
                                         
                                         
                                         
                                                                                  
                                            <div class="col-md-2 col-sm-2"></div>
                            </div>		
         			</div>
         		</div>

<!--         		<div id="owl-speakers" class="owl-carousel">
         
         			<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
         				<div class="speakers-wrapper">
         					<img src="images/speakers-img1.jpg" class="img-responsive" alt="speakers">
         						<div class="speakers-thumb">
         							<h3>Jenny Green</h3>
         							<h6>UI Designer</h6>
         						</div>
         				</div>
         			</div>
         
         			<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
         				<div class="speakers-wrapper">
         					<img src="images/speakers-img2.jpg" class="img-responsive" alt="speakers">
         						<div class="speakers-thumb">
         							<h3>David Yoon</h3>
         							<h6>Creative Director</h6>
         						</div>
         				</div>
         			</div>
         
         			<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.9s">
         				<div class="speakers-wrapper">
         					<img src="images/speakers-img3.jpg" class="img-responsive" alt="speakers">
         						<div class="speakers-thumb">
         							<h3>Je Mary Lee</h3>
         							<h6>Web Specialist</h6>
         						</div>
         				</div>
         			</div>
         
         			<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
         				<div class="speakers-wrapper">
         					<img src="images/speakers-img4.jpg" class="img-responsive" alt="speakers">
         						<div class="speakers-thumb">
         							<h3>Johnathan Doe</h3>
         							<h6>Frontend Dev</h6>
         						</div>
         				</div>
         			</div>
         
         			<div class="item wow fadeInUp col-md-3 col-sm-3" data-wow-delay="0.6s">
         				<div class="speakers-wrapper">
         					<img src="images/speakers-img5.jpg" class="img-responsive" alt="speakers">
         						<div class="speakers-thumb">
         							<h3>Elite Hamilton</h3>
         							<h6>Marketing Guru</h6>
         						</div>
         				</div>
         			</div>
         			
         		</div>-->
         
         	</div>
         </div>
         </section>
         <!-- =========================
         VACANTES SECTION   
         ============================== -->
            <section id="vacantes" class="parallax-section">
             <div class="container">
                <div class="row">
                   <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
                      <div class="section-title">
                         <h2>Bolsa de trabajo</h2>
                      </div>
                   </div>
                   <div class="wow fadeInUp col-md-10 col-sm-10" data-wow-delay="0.9s">
                      <div class="tab-content">
                          <!--Esto se repite-->
                         <div role="tabpanel" class="tab-pane active" id="fday">
                            <!-- program speaker here -->
                            <div class="col-md-2 col-sm-2">
                               <img src="images/program-img1.jpg" class="img-responsive" alt="program">
                            </div>
                            <div class="col-md-10 col-sm-10">
                               <!--	<h6>
                                  <span><i class="fa fa-clock-o"></i> 10.00 AM</span> 
                                  <span><i class="fa fa-map-marker"></i> Room 360</span>
                                  </h6>-->
                               <a href="#register" onclick="llenaVacante('Desarrollador PHP',1);">
                                  <h3>Desarrollador PHP</h3>
                               </a>
                               <h4>ESCOLARIDAD: Licenciatura o Ingenieria en Sistemas Computacionales o AFIN.
                                  SEXO: Indistinto
                               </h4>
                               <p>EXPERIENCIA:  1 a 3 años 
                                  Programación WEB  
                                  HTML, HTTP, Manejo de certificados para sitios seguros XML, XSL 
                                  Manejo de plantillas .NET WEB, ASP 
                                  JQuery, PHP, JOOMLA, Java Script, Ajax, Web services 
                                  Herramientas de diseño gráfico 
                                  Diseño gráfico 
                                  Base de datos 
                                  Manejo de prototipos 
                                  Diseño visual
                               </p>
                               <p>Sueldo: 11 mil mensuales</p>
                            </div>
                            <!-- program divider -->
                            <div class="vacantes-divider col-md-12 col-sm-12"></div>
                         </div>
                          <!--fin de lo que se repite-->
                          
                           <!--Esto se repite-->
                         <div role="tabpanel" class="tab-pane active" id="fday">
                            <!-- program speaker here -->
                            <div class="col-md-2 col-sm-2">
                               <img src="images/program-img1.jpg" class="img-responsive" alt="program">
                            </div>
                            <div class="col-md-10 col-sm-10">
                               <!--	<h6>
                                  <span><i class="fa fa-clock-o"></i> 10.00 AM</span> 
                                  <span><i class="fa fa-map-marker"></i> Room 360</span>
                                  </h6>-->
                               <a href="#register" onclick="llenaVacante('Desarrollador Java',2);">
                                  <h3>Desarrollador Java</h3>
                               </a>
                               <h4>ESCOLARIDAD: Licenciatura o Ingenieria en Sistemas Computacionales o AFIN.
                                  SEXO: Indistinto
                               </h4>
                               <p>EXPERIENCIA:  1 a 3 años 
                                  Programación WEB  
                                  HTML, HTTP, Manejo de certificados para sitios seguros XML, XSL 
                                  Manejo de plantillas .NET WEB, ASP 
                                  Java SE y EE
                                  Manejo de Frameworks (Sprint o Hibernate)
                                  Base de datos NoSql
                                  Manejo de prototipos 
                                  Diseño visual
                               </p>
                               <p>Sueldo: 15 mil mensuales</p>
                            </div>
                            <!-- program divider -->
                            <div class="vacantes-divider col-md-12 col-sm-12"></div>
                         </div>
                          <!--fin de lo que se repite-->
                          
                          
                      </div>
                   </div>
                </div>
             </div>
          </section>

      

         
         
         
         
      
      <!-- =========================
         BECARIOS SECTION   
         ============================== -->
     
      
         <section id="becarios" class="parallax-section">
             <div class="container">
                <div class="row">
                   <div class="wow fadeInUp col-md-12 col-sm-12" data-wow-delay="0.6s">
                      <div class="section-title">
                         <h2>Becarios</h2>
                      </div>
                   </div>
                   <div class="wow fadeInUp col-md-10 col-sm-10" data-wow-delay="0.9s">
                      <div class="tab-content">
                          <!--Esto se repite-->
                         <div role="tabpanel" class="tab-pane active" id="fday">
                            <!-- program speaker here -->
                            <div class="col-md-2 col-sm-2">
                               <img src="images/program-img1.jpg" class="img-responsive" alt="program">
                            </div>
                            <div class="col-md-10 col-sm-10">
                               <!--	<h6>
                                  <span><i class="fa fa-clock-o"></i> 10.00 AM</span> 
                                  <span><i class="fa fa-map-marker"></i> Room 360</span>
                                  </h6>-->
                               <a href="#register" onclick="llenaVacante('Becario de Sistemas',3);">
                                  <h3>Becario de sistemas</h3>
                               </a>
                               <h4>ESCOLARIDAD: Últimos semestres de Licenciatura o Ingenieria en Sistemas Computacionales o AFIN.
                                  SEXO: Indistinto
                               </h4>
                               <p>Actividades: Apoyo a las actividades solicitadas por el área
                               </p>
                               <p>Apoyo: 3 mil mensuales</p>
                            </div>
                            <!-- program divider -->
                            <div class="vacantes-divider col-md-12 col-sm-12"></div>
                         </div>
                          <!--fin de lo que se repite-->
                          
                           <!--Esto se repite-->
                         <div role="tabpanel" class="tab-pane active" id="fday">
                            <!-- program speaker here -->
                            <div class="col-md-2 col-sm-2">
                               <img src="images/program-img1.jpg" class="img-responsive" alt="program">
                            </div>
                            <div class="col-md-10 col-sm-10">
                               <!--	<h6>
                                  <span><i class="fa fa-clock-o"></i> 10.00 AM</span> 
                                  <span><i class="fa fa-map-marker"></i> Room 360</span>
                                  </h6>-->
                               <a href="#register" onclick="llenaVacante('Becario Recursos Humanos',4);">
                                  <h3>Becario Recursos Humanos</h3>
                               </a>
                               <h4>ESCOLARIDAD: Últimos semestres de Licenciatura en psicología o AFIN.
                                  SEXO: Indistinto
                               </h4>
                               <p>Actividades: Apoyo a las actividades solicitadas por el área
                               </p>
                               <p>Apoyo: 3 mil mensuales</p>
                            </div>
                            <!-- program divider -->
                            <div class="vacantes-divider col-md-12 col-sm-12"></div>
                         </div>
                          <!--fin de lo que se repite-->
                          
                          
                      </div>
                   </div>
                </div>
             </div>
          </section>
       
      
      
      <!-- =========================
         REGISTER SECTION   
         ============================== -->
      <section id="register" class="parallax-section">
         <div class="container">
            <div class="row">
               <div class="wow fadeInUp col-md-7 col-sm-7" data-wow-delay="0.6s">
                  <h2>Sube tu CV</h2>
                  <h3>Unete al equipo Vsys.</h3>
                  <p>Envíanos tu CV para formar parte del equipo Vsys</p>
                  <p id="puesto"></p>
                  <p>El adjunto no deberá pesar más de 5 MB y el formato deberá ser PDF.</p>
               </div>
               <div class="wow fadeInUp col-md-5 col-sm-5" data-wow-delay="1s">
                  <form name="uploadCv" id="uploadCv" method="post" enctype="multipart/form-data">
                     {{ csrf_field() }}
                     <input name="firstname" type="text" class="form-control" id="firstname" placeholder="Nombre(s)">
                     <input name="lastname" type="text" class="form-control" id="lastname" placeholder="Apellidos">
                     <input name="curp" type="text" class="form-control" id="curp" placeholder="CURP">
                     <input name="address" type="text" class="form-control" id="address" placeholder="Dirección">
                     <input name="phone1" type="text" class="form-control" id="phone1" placeholder="Teléfono local">
                     <input name="phone2" type="text" class="form-control" id="phone2" placeholder="Celular">
                     <input name="email" type="email" class="form-control" id="email" placeholder="Correo electrónico">
                     <input name="vacante" type="text" class="form-control" id="vacante">
                     <input name="idPuesto" type="hidden"  id="idPuesto">
                     <input name="idTipoVacante" type="hidden"  id="idTipoVacante">
                     <input name="cv" type="file" style="height:110%" class="form-control" id="cv">
                    
                     
                     <div class="alert alert-danger" style="display:none"  name="cvError" id="cvError"></div>
                     <div class="alert alert-success" style="display:none"  name="cvSuccess" id="cvSuccess"></div>
                     <img id="loading" src="{{ asset('images/loading.gif') }}" width="15%" height="15%">
                     <div class="col-md-offset-6 col-md-6 col-sm-offset-1 col-sm-10">
                        
                         <input name="submitCv" type="submit" class="form-control" id="submitCv" value="Enviar">
                    
                     </div>
                      
                  </form>
               </div>
               <div class="col-md-1"></div>
            </div>
         </div>
      </section>
      <!-- =========================
         FAQ SECTION   
         ============================== -->
      <!--<section id="faq" class="parallax-section">
         <div class="container">
         	<div class="row">
         
         		 Section title
         		================================================== 
         		<div class="wow bounceIn col-md-offset-2 col-md-8 col-sm-offset-1 col-sm-10 text-center">
         			<div class="section-title">
         				<h2>Do you have Questions?</h2>
         				<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
         			</div>
         		</div>
         
         		<div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="0.9s">
         			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
         
          					<div class="panel panel-default">
           						<div class="panel-heading" role="tab" id="headingOne">
              						<h4 class="panel-title">
                						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  							 What is Responsive Design?
                						</a>
              						</h4>
            					</div>
           						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
              						<div class="panel-body">
                						<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus purus augue vulputate voluptate neque, curabitur dolor libero sodales vitae elit massa. Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
         							<p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at, scelerisque tempor erat.</p>
              						</div>
           						 </div>
         					</div>
         
            				<div class="panel panel-default">
           						<div class="panel-heading" role="tab" id="headingTwo">
              						<h4 class="panel-title">
                						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  							What are latest UX Developments?
                						</a>
              						</h4>
            					</div>
           						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
              						<div class="panel-body">
                                    	<p>Nunc eu nibh vel augue mollis tincidunt id efficitur tortor. Sed pulvinar est sit amet tellus iaculis hendrerit. Mauris justo erat, rhoncus in arcu at, scelerisque tempor erat.</p>
                						<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus purus augue vulputate voluptate neque, curabitur dolor libero sodales vitae elit massa. Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
              						</div>
           						 </div>
         					</div>
         
         					<div class="panel panel-default">
           						<div class="panel-heading" role="tab" id="headingThree">
              						<h4 class="panel-title">
                						<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  							What things about Social Media will be discussed?
                						</a>
              						</h4>
            					</div>
           						<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
              						<div class="panel-body">
                                    	<p>Aenean vulputate finibus justo et feugiat. Ut turpis lacus, dapibus quis justo id, porttitor tempor justo. Quisque ut libero sapien. Integer tellus nisl, efficitur sed dolor at, vehicula finibus massa.</p>
                						<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet, wisi risus purus augue vulputate voluptate neque, curabitur dolor libero sodales vitae elit massa. Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
              						</div>
           						 </div>
         					 </div>
         
         				 </div>
         		</div>
         
         	</div>
         </div>
         </section>-->
      <!-- =========================
         VENUE SECTION   
         ============================== -->
      <section id="contacto" class="parallax-section">
         <div class="container">
            <div class="row" id="rowContacto">
               <div class="wow fadeInLeft col-md-offset-1 col-md-5 col-sm-8" data-wow-delay="0.9s">
                  <h2>Ubicación</h2>
                  <!--				<p>Contáctenos para mayor información</p>-->
                  <h5>Torre Telmex 5° piso</h5>
                  <h5>Insurgentes Sur 3500, Colonia Peña Pobre</h5>
                  <h5>Delegación Tlalpan, CP 14060</h5>
                  <h5><i class="fa fa-phone" aria-hidden="true"></i>&nbsp;1105-6000</h5>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.6278034018487!2d-99.18552803564931!3d19.29854544995567!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce007a333f612d%3A0x106835f9511ce255!2sTelmex%2C+Manantial+Pe%C3%B1a+Pobre%2C+14060+Ciudad+de+M%C3%A9xico%2C+D.F.!5e0!3m2!1ses-419!2smx!4v1478112766929" width="550" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </section>
      <!-- =========================
         SPONSORS SECTION   
         ============================== -->
      <!--<section id="sponsors" class="parallax-section">
         <div class="container">
         	<div class="row">
         
         		<div class="wow bounceIn col-md-12 col-sm-12">
         			<div class="section-title">
         				<h2>Our Sponsors</h2>
         				<p>Lorem ipsum dolor sit amet, maecenas eget vestibulum justo imperdiet.</p>
         			</div>
         		</div>
         
         		<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.3s">
         			<img src="images/sponsor-img1.jpg" class="img-responsive" alt="sponsors">	
         		</div>
         
         		<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.6s">
         			<img src="images/sponsor-img2.jpg" class="img-responsive" alt="sponsors">	
         		</div>
         
         		<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="0.9s">
         			<img src="images/sponsor-img3.jpg" class="img-responsive" alt="sponsors">	
         		</div>
         
         		<div class="wow fadeInUp col-md-3 col-sm-6 col-xs-6" data-wow-delay="1s">
         			<img src="images/sponsor-img4.jpg" class="img-responsive" alt="sponsors">	
         		</div>
         
         	</div>
         </div>
         </section>-->
      <!-- =========================
         CONTACT SECTION   
         ============================== -->
      <section id="contact" class="parallax-section">
         <div class="container">
            <div class="row">
               <div class="wow fadeInUp col-md-5 col-sm-12" data-wow-delay="0.9s">
                  <div class="contact_detail">
                     <div class="section-title">
                        <h2>Inicio de Sesión</h2>
                     </div>
                     <form name="loginForm" method="post">
                        {{ csrf_field() }}
                        <input name="username" id="username" type="text" class="form-control" id="name" placeholder="Usuario">
                        <input name="password" id="password" type="password" class="form-control" id="email" placeholder="Contraseña">
                        <div class="alert alert-danger" style="display:none"  name="loginError" id="loginError"></div>
                        
                        <div class="col-md-6 col-sm-10">
                           <input name="loginButton" type="button" class="btn btn-danger" id="loginButton" value="Entrar">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- =========================
         FOOTER SECTION   
         ============================== -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12">
                  <p class="wow fadeInUp" data-wow-delay="0.6s">Copyright &copy; 2016 Vsys</p>
                  <ul class="social-icon">
                     <li><a href="#" class="fa fa-facebook wow fadeInUp" data-wow-delay="1s"></a></li>
                     <li><a href="#" class="fa fa-twitter wow fadeInUp" data-wow-delay="1.3s"></a></li>
                     <li><a href="#" class="fa fa-dribbble wow fadeInUp" data-wow-delay="1.6s"></a></li>
                     <li><a href="#" class="fa fa-behance wow fadeInUp" data-wow-delay="1.9s"></a></li>
                     <li><a href="#" class="fa fa-google-plus wow fadeInUp" data-wow-delay="2s"></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </footer>
      <!-- Back top -->
      <a href="#back-top" class="go-top"><i class="fa fa-angle-up"></i></a>
      <!-- =========================
         SCRIPTS   
         ============================== -->
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.parallax.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/smoothscroll.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/custom.js"></script>
   </body>
</html>