<?php
require_once '../Model/Contenido.php';

$fecha1 = "$_POST[fechaAlta]"; 
$fecha2 = date("y-m-d", strtotime($fecha1));

$Animal_Alta = new Contenido($_POST[idAlta],$fecha2 ,$_POST[generoAlta],$_POST[edadAlta],$_POST[provinciaAlta],$_POST[tipoAlta]);
$Animal_Alta->insert();
