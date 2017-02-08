<?php

require_once("../Controller/sesion.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");
	
	if( $usuario == false )
	{
      ?>
       
       <?php
		header("Location: ../View/login.php");		
	}
	else 
            
	{
	?>
            <div style="color:white; width: 400px; height:150px; border-radius: 10px; margin-bottom:1%; ">
            <h1> Hola  <?php echo $sesion->get("usuario"); ?> </h1>
            <br>
        <a href="cerrarsesion.php"><input type="button" class="btn btn-danger" Value="Cerrar"> </a>
            </div>
	
	
	<?php 
	}
                     
   ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trabajo Ajax</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="../View/CSS/style.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"/>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript" src="../Controller/js/main.js"></script>
   
  </head>
  <body>
   
      <div class="container-fluid">
     
        <div style="cursor:pointer; width:100px; "><img src="../View/imagenes/nuevo.png" width="70" height="70" id="nuevo" title="Nuevo Animal"></div>

    <div id="seleccion"> <b style="color:white;">Ordenar por</b>  <select name="campos" id="campos">
      <option value="1">Codigo</option>
      <option value="2">Fecha</option>
      <option value="6">Tipo</option>
    </select>
        
      <select name="forma" id="forma">
      <option value="ASC">Asc</option>
      <option value="DESC">Desc</option>
   
    </select></div>
     <div class="row">
        <div class="col-xs-12">

          <div class="outer_div"></div>
        </div>

      </div>

      <!-- Dialogo Borrar Animal -->
      <div id="dialogoborrar" class="dialogo" title="Eliminar Animal">
        <p>¿Esta seguro que desea eliminar este Animal?</p>
      </div>
       <?php
       
     require_once '../Model/Tipo.php';
     $data['listadoTipo'] = Tipo::getListTipo();
     
     ?>
      <!-- Dialogo Modificar Animal-->
      <div id="dialogomodificar" class="dialogo" title="Modificar Animal">
        <?php include "../View/Formulario_modificar.php";
        ?>
      </div>
      
      <!-- Dialogo Añadir Animal -->
      <div id="dialogoalta" class="dialogo" title="Nuevo Animal">
        <?php include "../View/Formulario_alta.php";?>
      </div>

    </div>
  </body>
</html>
