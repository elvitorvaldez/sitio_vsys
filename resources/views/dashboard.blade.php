<!DOCTYPE html>
<head>
    <style>
         /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}



    </style>
   <meta http-equiv="content-type" content="text/html; charset=UTF-8">
   <meta charset="utf-8">
  <title>Vsys</title>
      <link rel="shortcut icon" href="{{ asset('favicon.png') }}" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

 <link rel="stylesheet" href="{{ asset('css/menu.css') }}">
 <link rel="stylesheet" type="text/css" media="all" href="{{ asset('css/jquery.dataTables.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
   
   <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}">
      <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">

   <script src="https://code.jquery.com/jquery-1.12.3.js" type="text/javascript"></script>
   <script src="{{ asset('js/menu.js') }}" type="text/javascript"></script>
   <script src="{{ asset('js/jquery.dataTables.js') }}" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>

</head>
<body>
   
      <nav >
         <ul class="menu">
            <li>
               <a href="#"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;{{ $data['usuario'] }}</a>
               <ul class="sub-menu">
                  <li><a href="{{ url('logout') }}">Salir</a></li>
               </ul>
            </li>
         </ul>
      </nav>
<div class="container">
<div class="jumbotron">


<!-- The Modal -->
<div id="myModal" class="modal" style="margin-top:-5% !important;">

  <!-- Modal content -->
  <div class="modal-content">
  
   
    <div class="modal-header">
                            <span class="close">&times;</span>
                           <h4>Publicar Vacante</h4>
                        </div>
      
      
      <div class="modal-body">
           <form name="loadPosition" id="loadPosition" method="post" >
                     {{ csrf_field() }}
                     
                    <div style="overflow: hidden; padding-bottom: 2%"> 
                        <label for="position" style="float: left;">Nombre del Puesto</label>
                        <input name="position" type="text" class="form-control" style="width:22%; margin-left: 3%; margin-right: 3%;float: left" id="position">
                        <label for="school" style="float: left;" >Tipo de puesto</label>
                       <select class="form-control" name="positionKind" id="positionKind" style="width:22%; margin-left: 3%; margin-right: 3%;float: left">
                           <option value=""> Selecione </option>
                           <option value="1"> Bolsa de trabajo </option>
                           <option value="2"> Becario </option>    
                       </select>
                    </div> 
                     
                     
                    <div style="overflow: hidden; padding-bottom: 2%"> 
                        <label for="school" style="float: left;" >Escolaridad</label>
                        <input name="school" type="text" class="form-control" style="width:22%; margin-left: 3%; margin-right: 3%; float: left" id="school">
                        <label for="salary" style="float: left;" >Sueldo</label>
                        <input name="salary" type="text" class="form-control" style="width:12%; margin-left: 3%; margin-right: 3%; float: left" id="salary">
                      <label for="hentrada" style="float: left;" >Horario:&nbsp;</label>
                       <select class="form-control" style="width:10%;float: left" name="hentrada" id="hentrada">
                           <option value="">Entrada</option>
                        <?php 
                        for ($hora=9;$hora<=14;$hora++)
                        {
                         echo "<option value='$hora:00'>$hora:00</option>";  
                        }
                        ?>
                       </select>
                        
                        <select class="form-control" style="width:10%;float: left" name="hsalida" id="hsalida">
                           <option value="">Salida</option>
                        <?php 
                        for ($hora=13;$hora<=19;$hora++)
                        {
                         echo "<option value='$hora:00'>$hora:00</option>";  
                        }
                        ?>
                       </select>
                    </div>
                     
                     <div style="overflow: hidden;padding-bottom: 2%"> 
                        <label for="skills" style="float: left;">Habilidades</label>
                        <textarea name="skills" type="text" class="form-control" style="width:55%; margin-left: 3%; margin-right: 3%;float: left" id="skills"></textarea>
                      
                        

                    </div>
                     
                    <div style="overflow: hidden"> 
                        <label for="description" style="float: left;">Descripción de actividades</label>
                        <textarea name="description" type="text" class="form-control" style="width:75%; margin-left: 3%; margin-right: 3%;float: left" id="description"></textarea>
                        
                    </div>
                 
      </div>   
       <div class="alert alert-danger" style="display:none"  name="posError" id="posError"></div>
                     <div class="alert alert-success" style="display:none"  name="posSuccess" id="posSuccess"></div>
      <div class="modal-footer">
          <input class="btn btn-primary" name="submitPosition" type="submit" class="form-control" id="submitPosition" value="Enviar">  
      </div>
       </form>
      
  </div>

</div>
    <h3>Postulaciones</h3>
 
   
    
    
      <button type="button" class="btn btn-primary" id="myBtn">Insertar Vacante</button>
      <br><br>
      <table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Curp</th>
                <th>Vacante</th>
                <th>E-mail</th>
                <th>Status</th>
                <th>Tags</th>
		<th>Archivo</th>
            </tr>
        </thead>
       
        <tbody>
           <?php $arreglo = $data['tabla']?> 
            
          @foreach ($arreglo as $datos)
      <tr>
                <td>{{$datos->nombre}}</td>
                <td>{{$datos->apellidos}}</td>
                <td>{{$datos->curp}}</td>
                <td>{{$datos->puesto}}</td>
                <td>{{$datos->email}}</td>
                <td>{{$datos->id_status}}</td>
                <td>{{$datos->id_tag}}</td>
                <td><a target="_blank" href="uploads/{{$datos->ruta_cv}}">{{$datos->ruta_cv}}</a></td>
            </tr>

    @endforeach
            
            
            
           
        </tbody>
    </table>

  
</div>
       
    
   </div>

<script languaje="javascript">
 var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}



$(document).ready(function() {

 $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });


     $("#loadPosition").submit(function(event) {
         event.preventDefault();
         var f = $(this);
         var formData = new FormData(document.getElementById("loadPosition"));
         $.ajax({
                 url: "{{ url('savePosition') }}",
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
                     $("#posError").html('<strong>' + res.mensaje + '</strong>');
                     $("#posError").show(1000);

                     setTimeout(function() {
                         $("#posError").fadeOut(1500);
                     }, 3000);
                 } else {
                     $("#posSuccess").html('<strong>Su postulación ha sido cargada correctamente</strong>');
                     $("#posSuccess").show(1000);

                     setTimeout(function() {
                         $("#posSuccess").fadeOut(1500);
                     }, 3000);
                 }

             });

     });






 });

 </script>
</body>
</html>
